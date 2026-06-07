<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    /**
     * Store a newly created booking in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'guest_name' => 'required|string|max:255',
            'guest_email' => 'required|email|max:255',
            'guest_phone' => 'required|string|max:50',
            'guests_count' => 'required|integer|min:1',
            'room_type' => 'required|string|in:Couple Room,Family Room,Function Hall',
            'check_in_date' => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
            'payment_method' => 'required|string|in:credit_card,gcash,cash_at_property',
            'cash_securing_method' => 'nullable|string|in:card,gcash',
            'receipt' => 'nullable|file|image|max:5120', // Max 5MB
            'card_last_four' => 'nullable|string|max:4',
        ]);

        $checkIn = Carbon::parse($validated['check_in_date'])->startOfDay();
        $checkOut = Carbon::parse($validated['check_out_date'])->startOfDay();
        $nights = $checkIn->diffInDays($checkOut);

        if ($nights < 1) {
            return response()->json([
                'success' => false,
                'message' => 'Minimum stay is 1 night.'
            ], 422);
        }

        // Find rooms matching type (ordered by ID descending to select the latest available room)
        $rooms = Room::where('type', $validated['room_type'])->orderBy('id', 'desc')->get();

        if ($rooms->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No rooms of this type exist in the system.'
            ], 422);
        }

        // Find first available room
        $allocatedRoom = null;
        foreach ($rooms as $room) {
            $overlappingCount = Booking::where('room_id', $room->id)
                ->where('status', '!=', 'REJECTED')
                ->where(function ($query) use ($checkIn, $checkOut) {
                    $query->where('check_in_date', '<', $checkOut->toDateString())
                          ->where('check_out_date', '>', $checkIn->toDateString());
                })
                ->count();

            if ($overlappingCount === 0) {
                $allocatedRoom = $room;
                break;
            }
        }

        if (!$allocatedRoom) {
            return response()->json([
                'success' => false,
                'message' => 'We are sorry, but there are no available rooms of this type for the selected dates.'
            ], 422);
        }

        // Calculations
        $rate = (float) $allocatedRoom->price;
        $totalPrice = $rate * $nights;

        if ($validated['payment_method'] === 'cash_at_property') {
            $downPayment = $totalPrice * 0.30;
            $remainingBalance = $totalPrice * 0.70;
        } else {
            $downPayment = $totalPrice;
            $remainingBalance = 0.00;
        }

        // Handle File Upload for receipt screenshots
        $receiptPath = null;
        if ($request->hasFile('receipt')) {
            $file = $request->file('receipt');
            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            // Store under storage/app/public/receipts
            $file->storeAs('receipts', $fileName, 'public');
            $receiptPath = '/storage/receipts/' . $fileName;
        }

        // Generate a unique Reference Code: AS-XXXXX where X is a numeric digit
        $reference = '';
        do {
            $randomDigits = str_pad((string) rand(0, 99999), 5, '0', STR_PAD_LEFT);
            $reference = 'AS-' . $randomDigits;
        } while (Booking::where('reference', $reference)->exists());

        // Save Booking
        $booking = Booking::create([
            'reference' => $reference,
            'room_id' => $allocatedRoom->id,
            'guest_name' => $validated['guest_name'],
            'guest_email' => $validated['guest_email'],
            'guest_phone' => $validated['guest_phone'],
            'guests_count' => $validated['guests_count'],
            'special_requests' => $request->input('special_requests'),
            'check_in_date' => $checkIn->toDateString(),
            'check_out_date' => $checkOut->toDateString(),
            'nights_count' => $nights,
            'payment_method' => $validated['payment_method'],
            'cash_securing_method' => $validated['cash_securing_method'] ?? null,
            'receipt_file_path' => $receiptPath,
            'card_last_four' => $validated['card_last_four'] ?? null,
            'down_payment' => $downPayment,
            'remaining_balance' => $remainingBalance,
            'total_price' => $totalPrice,
            'status' => 'PENDING',
        ]);

        // Eager load room relationship
        $booking->load('room');

        return response()->json([
            'success' => true,
            'booking' => $booking
        ]);
    }

    /**
     * Display the specified booking by Reference Code.
     */
    public function show(\Illuminate\Http\Request $request, $reference)
    {
        $referenceUpper = strtoupper(trim($reference));
        $email = trim(strtolower($request->query('email', '')));

        if (empty($email)) {
            return response()->json([
                'success' => false,
                'message' => 'Please provide the guest email address used for the booking.'
            ], 422);
        }

        $booking = Booking::where('reference', $referenceUpper)
            ->whereRaw('LOWER(guest_email) = ?', [$email])
            ->with('room')
            ->first();

        if (!$booking) {
            return response()->json([
                'success' => false,
                'message' => 'Booking reference code or email address not found.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'booking' => $booking
        ]);
    }

    /**
     * Get all pending bookings (Admin/Manager API).
     */
    public function getPendingBookings(\Illuminate\Http\Request $request)
    {
        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = auth()->user();
        if ($user->role !== 'admin' && $user->role !== 'manager' && $user->role !== 'staff') {
            return response()->json([
                'success' => false,
                'message' => 'Forbidden'
            ], 403);
        }

        $bookings = Booking::where('status', 'PENDING')
            ->with('room')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'bookings' => $bookings
        ]);
    }

    /**
     * Get all confirmed bookings (Admin/Manager API).
     */
    public function getConfirmedBookings(\Illuminate\Http\Request $request)
    {
        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = auth()->user();
        if ($user->role !== 'admin' && $user->role !== 'manager' && $user->role !== 'staff') {
            return response()->json([
                'success' => false,
                'message' => 'Forbidden'
            ], 403);
        }

        $bookings = Booking::where('status', 'CONFIRMED')
            ->with('room')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'bookings' => $bookings
        ]);
    }

    /**
     * Get all rejected bookings (Admin/Manager API).
     */
    public function getRejectedBookings(\Illuminate\Http\Request $request)
    {
        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = auth()->user();
        if ($user->role !== 'admin' && $user->role !== 'manager' && $user->role !== 'staff') {
            return response()->json([
                'success' => false,
                'message' => 'Forbidden'
            ], 403);
        }

        $bookings = Booking::where('status', 'REJECTED')
            ->with('room')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'bookings' => $bookings
        ]);
    }

    /**
     * Approve a pending booking (Admin/Manager API).
     */
    public function approveBooking(\Illuminate\Http\Request $request, $id)
    {
        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = auth()->user();
        if ($user->role !== 'admin' && $user->role !== 'manager' && $user->role !== 'staff') {
            return response()->json([
                'success' => false,
                'message' => 'Forbidden'
            ], 403);
        }

        $booking = Booking::findOrFail($id);
        $booking->status = 'CONFIRMED';
        $booking->save();

        // If the stay is active now, mark the room as occupied
        $room = $booking->room;
        if ($room) {
            $now = Carbon::now('Asia/Manila');
            $checkInTimeStr = $booking->check_in_time ?: '12:00 PM';
            $checkOutTimeStr = $booking->check_out_time ?: '11:00 AM';
            
            $checkInDateTime = Carbon::parse($booking->check_in_date->toDateString() . ' ' . $checkInTimeStr, 'Asia/Manila');
            $checkOutDateTime = Carbon::parse($booking->check_out_date->toDateString() . ' ' . $checkOutTimeStr, 'Asia/Manila');
            
            if ($now >= $checkInDateTime && $now < $checkOutDateTime) {
                $room->status = 'occupied';
                $room->save();
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Booking approved successfully',
            'booking' => $booking
        ]);
    }

    /**
     * Reject a pending booking (Admin/Manager API).
     */
    public function rejectBooking(\Illuminate\Http\Request $request, $id)
    {
        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = auth()->user();
        if ($user->role !== 'admin' && $user->role !== 'manager' && $user->role !== 'staff') {
            return response()->json([
                'success' => false,
                'message' => 'Forbidden'
            ], 403);
        }

        $validated = $request->validate([
            'rejection_reason' => 'required|string|max:255',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->status = 'REJECTED';
        $booking->rejection_reason = $validated['rejection_reason'];
        $booking->save();

        return response()->json([
            'success' => true,
            'message' => 'Booking rejected successfully',
            'booking' => $booking
        ]);
    }

    /**
     * Get Sales/Performance Report for Aruga Admin (Admin/Manager API).
     */
    public function getSalesReport(\Illuminate\Http\Request $request)
    {
        if (!auth()->check()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $user = auth()->user();
        if ($user->role !== 'admin' && $user->role !== 'manager' && $user->role !== 'staff') {
            return response()->json(['success' => false, 'message' => 'Forbidden'], 403);
        }

        $timeframe = $request->query('timeframe', 'monthly');
        $now = Carbon::now();
        
        switch ($timeframe) {
            case 'daily':
                $start = $now->copy()->startOfDay();
                $end = $now->copy()->endOfDay();
                $prevStart = $start->copy()->subDay();
                $prevEnd = $end->copy()->subDay();
                $daysInPeriod = 1;
                break;
            case 'weekly':
                $start = $now->copy()->startOfWeek();
                $end = $now->copy()->endOfWeek();
                $prevStart = $start->copy()->subWeek();
                $prevEnd = $end->copy()->subWeek();
                $daysInPeriod = 7;
                break;
            case 'yearly':
                $start = $now->copy()->startOfYear();
                $end = $now->copy()->endOfYear();
                $prevStart = $start->copy()->subYear();
                $prevEnd = $end->copy()->subYear();
                $daysInPeriod = 365;
                break;
            case 'monthly':
            default:
                $start = $now->copy()->startOfMonth();
                $end = $now->copy()->endOfMonth();
                $prevStart = $start->copy()->subMonth();
                $prevEnd = $end->copy()->subMonth();
                $daysInPeriod = $start->diffInDays($end) + 1;
                break;
        }

        $currStats = $this->getPeriodStats($start, $end, $daysInPeriod);
        $prevStats = $this->getPeriodStats($prevStart, $prevEnd, $daysInPeriod);

        $stats = [
            'revenue' => [
                'value' => $currStats['revenue'],
                'change' => $this->calculatePercentageChange($currStats['revenue'], $prevStats['revenue'])
            ],
            'bookings' => [
                'value' => $currStats['bookings'],
                'change' => $this->calculatePercentageChange($currStats['bookings'], $prevStats['bookings'])
            ],
            'approved' => [
                'value' => $currStats['approved'],
                'change' => $this->calculatePercentageChange($currStats['approved'], $prevStats['approved'])
            ],
            'occupancy' => [
                'value' => $currStats['occupancy'],
                'change' => $this->calculatePercentageChange($currStats['occupancy'], $prevStats['occupancy'])
            ]
        ];

        // Fetch paginated transactions in the period (ordered by check-in date or created date)
        $query = Booking::with('room')
            ->where('created_at', '>=', $start)
            ->where('created_at', '<=', $end)
            ->orderBy('created_at', 'desc');

        $paginator = $query->paginate(10);

        $transactions = collect($paginator->items())->map(function ($b) {
            $statusType = 'pending';
            if ($b->status === 'CONFIRMED') {
                $statusType = 'paid';
            } elseif ($b->status === 'REJECTED') {
                $statusType = 'failed';
            }

            $methodType = 'cash';
            if ($b->payment_method === 'credit_card') {
                $methodType = 'credit_card';
            } elseif ($b->payment_method === 'gcash') {
                $methodType = 'gcash';
            }

            $methodText = 'Cash';
            if ($b->payment_method === 'credit_card') {
                $methodText = 'Credit Card';
            } elseif ($b->payment_method === 'gcash') {
                $methodText = 'G-Cash';
            }

            return [
                'id' => $b->id,
                'date' => Carbon::parse($b->created_at)->format('M d, Y'),
                'name' => $b->guest_name,
                'roomType' => $b->room ? $b->room->name : 'Unknown Room',
                'method' => $methodText,
                'methodType' => $methodType,
                'amount' => number_format($b->total_price, 2),
                'status' => ucfirst(strtolower($b->status)),
                'statusType' => $statusType
            ];
        });

        return response()->json([
            'success' => true,
            'stats' => $stats,
            'transactions' => $transactions,
            'pagination' => [
                'current_page' => $paginator->currentPage(),
                'last_page' => $paginator->lastPage(),
                'total' => $paginator->total(),
            ]
        ]);
    }

    private function getPeriodStats(Carbon $start, Carbon $end, $daysInPeriod)
    {
        // Revenue: CONFIRMED bookings created in period
        $revenue = (float) Booking::where('status', 'CONFIRMED')
            ->where('created_at', '>=', $start)
            ->where('created_at', '<=', $end)
            ->sum('total_price');

        // Bookings: Total non-rejected bookings created in period
        $bookings = Booking::where('status', '!=', 'REJECTED')
            ->where('created_at', '>=', $start)
            ->where('created_at', '<=', $end)
            ->count();

        // Approved: CONFIRMED bookings created in period
        $approved = Booking::where('status', 'CONFIRMED')
            ->where('created_at', '>=', $start)
            ->where('created_at', '<=', $end)
            ->count();

        // Occupancy: confirmed booking room nights occupied in period / total room nights
        $totalRooms = Room::count() ?: 11;
        $totalRoomNights = $totalRooms * $daysInPeriod;
        
        $occupiedRoomNights = 0;
        $endForOccupancy = $end->copy()->addDay();
        
        // Find confirmed bookings checking in or active during the period
        $bookingsForOccupancy = Booking::where('status', 'CONFIRMED')
            ->where('check_in_date', '<', $endForOccupancy->toDateString())
            ->where('check_out_date', '>', $start->toDateString())
            ->get();

        foreach ($bookingsForOccupancy as $b) {
            $bStart = Carbon::parse($b->check_in_date);
            $bEnd = Carbon::parse($b->check_out_date);
            
            // Overlap range
            $overlapStart = $bStart->max($start);
            $overlapEnd = $bEnd->min($endForOccupancy);
            
            $overlapNights = $overlapStart->diffInDays($overlapEnd);
            if ($overlapNights > 0) {
                $occupiedRoomNights += $overlapNights;
            }
        }

        $occupancy = $totalRoomNights > 0 ? ($occupiedRoomNights / $totalRoomNights) * 100 : 0.0;

        return [
            'revenue' => $revenue,
            'bookings' => $bookings,
            'approved' => $approved,
            'occupancy' => $occupancy
        ];
    }

    private function calculatePercentageChange($current, $previous)
    {
        if ($previous == 0) {
            return $current > 0 ? 100.0 : 0.0;
        }
        return (($current - $previous) / $previous) * 100.0;
    }
}

