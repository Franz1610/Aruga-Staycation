<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::post('/api/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials, $request->boolean('remember'))) {
        $request->session()->regenerate();
        $user = Auth::user();
        return response()->json([
            'success' => true,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
            ]
        ]);
    }

    return response()->json([
        'success' => false,
        'message' => 'The provided credentials do not match our records.',
    ], 422);
});

Route::post('/api/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return response()->json(['success' => true]);
});

Route::get('/api/user', function () {
    if (Auth::check()) {
        $user = Auth::user();
        return response()->json([
            'logged_in' => true,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
            ]
        ]);
    }
    return response()->json(['logged_in' => false]);
});

Route::get('/api/users', function () {
    if (!Auth::check()) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }
    
    $user = Auth::user();
    if ($user->role !== 'admin' && $user->role !== 'manager') {
        return response()->json(['message' => 'Forbidden'], 403);
    }

    $users = App\Models\User::select('id', 'name', 'email', 'role', 'created_at')->get();
    return response()->json([
        'success' => true,
        'users' => $users
    ]);
});

Route::post('/api/users', function (Request $request) {
    if (!Auth::check()) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }
    
    $currentUser = Auth::user();
    if ($currentUser->role !== 'admin' && $currentUser->role !== 'manager') {
        return response()->json(['message' => 'Forbidden'], 403);
    }

    $data = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:6'],
        'role' => ['required', 'string', 'in:manager,staff'],
    ]);

    $user = App\Models\User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'role' => $data['role'],
        'password' => $data['password'],
    ]);

    return response()->json([
        'success' => true,
        'user' => $user
    ]);
});

Route::put('/api/users/{id}', function (Request $request, $id) {
    if (!Auth::check()) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }
    
    $currentUser = Auth::user();
    if ($currentUser->role !== 'admin' && $currentUser->role !== 'manager') {
        return response()->json(['message' => 'Forbidden'], 403);
    }

    $user = App\Models\User::findOrFail($id);

    $data = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
        'role' => ['required', 'string', 'in:manager,staff'],
        'password' => ['nullable', 'string', 'min:6'],
    ]);

    $user->name = $data['name'];
    $user->email = $data['email'];
    $user->role = $data['role'];
    if (!empty($data['password'])) {
        $user->password = $data['password'];
    }
    $user->save();

    return response()->json([
        'success' => true,
        'user' => $user
    ]);
});

Route::post('/api/user/change-password', function (Request $request) {
    if (!Auth::check()) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    $user = Auth::user();

    $data = $request->validate([
        'current_password' => ['required', 'string'],
        'new_password' => ['required', 'string', 'min:6'],
    ]);

    if (!Illuminate\Support\Facades\Hash::check($data['current_password'], $user->password)) {
        return response()->json([
            'success' => false,
            'message' => 'The provided current password does not match our records.'
        ], 422);
    }

    $user->password = $data['new_password'];
    $user->save();

    return response()->json([
        'success' => true,
        'message' => 'Password changed successfully.'
    ]);
});

Route::get('/api/rooms', function () {
    $now = Illuminate\Support\Carbon::now('Asia/Manila');
    $today = $now->toDateString();
    
    // Find all confirmed bookings overlapping today
    $todayBookings = App\Models\Booking::where('status', 'CONFIRMED')
        ->where('check_in_date', '<=', $today)
        ->where('check_out_date', '>=', $today)
        ->get();

    $activeConfirmedRoomIds = [];
    foreach ($todayBookings as $b) {
        $checkInTimeStr = $b->check_in_time ?: '12:00 PM';
        $checkOutTimeStr = $b->check_out_time ?: '11:00 AM';
        
        $checkInDateTime = Illuminate\Support\Carbon::parse($b->check_in_date->toDateString() . ' ' . $checkInTimeStr, 'Asia/Manila');
        $checkOutDateTime = Illuminate\Support\Carbon::parse($b->check_out_date->toDateString() . ' ' . $checkOutTimeStr, 'Asia/Manila');
        
        if ($now >= $checkInDateTime && $now < $checkOutDateTime) {
            $activeConfirmedRoomIds[] = $b->room_id;
        }
    }

    $rooms = App\Models\Room::all();
    foreach ($rooms as $room) {
        if (in_array($room->id, $activeConfirmedRoomIds)) {
            if ($room->status !== 'occupied') {
                $room->status = 'occupied';
                $room->save();
            }
        } else {
            if ($room->status === 'occupied') {
                $room->status = 'available';
                $room->save();
            }
        }
    }

    return response()->json([
        'success' => true,
        'rooms' => App\Models\Room::all()
    ]);
});

use App\Http\Controllers\BookingController;

Route::post('/api/bookings', [BookingController::class, 'store']);
Route::get('/api/bookings/{reference}', [BookingController::class, 'show']);
Route::get('/api/admin/bookings/pending', [BookingController::class, 'getPendingBookings']);
Route::get('/api/admin/bookings/confirmed', [BookingController::class, 'getConfirmedBookings']);
Route::get('/api/admin/bookings/rejected', [BookingController::class, 'getRejectedBookings']);
Route::post('/api/admin/bookings/{id}/approve', [BookingController::class, 'approveBooking']);
Route::post('/api/admin/bookings/{id}/reject', [BookingController::class, 'rejectBooking']);
Route::get('/api/admin/sales', [BookingController::class, 'getSalesReport']);

Route::get('/api/admin/rooms', function () {
    if (!Auth::check()) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }
    $currentUser = Auth::user();
    if ($currentUser->role !== 'admin' && $currentUser->role !== 'manager' && $currentUser->role !== 'staff') {
        return response()->json(['message' => 'Forbidden'], 403);
    }

    $now = Illuminate\Support\Carbon::now('Asia/Manila');
    $today = $now->toDateString();

    // Auto-sync: Find all rooms that have an active confirmed booking today
    $todayBookings = App\Models\Booking::where('status', 'CONFIRMED')
        ->where('check_in_date', '<=', $today)
        ->where('check_out_date', '>=', $today)
        ->get();

    $activeConfirmedRoomIds = [];
    foreach ($todayBookings as $b) {
        $checkInTimeStr = $b->check_in_time ?: '12:00 PM';
        $checkOutTimeStr = $b->check_out_time ?: '11:00 AM';
        
        $checkInDateTime = Illuminate\Support\Carbon::parse($b->check_in_date->toDateString() . ' ' . $checkInTimeStr, 'Asia/Manila');
        $checkOutDateTime = Illuminate\Support\Carbon::parse($b->check_out_date->toDateString() . ' ' . $checkOutTimeStr, 'Asia/Manila');
        
        if ($now >= $checkInDateTime && $now < $checkOutDateTime) {
            $activeConfirmedRoomIds[] = $b->room_id;
        }
    }

    $rooms = App\Models\Room::orderBy('name', 'asc')->get();
    foreach ($rooms as $room) {
        if (in_array($room->id, $activeConfirmedRoomIds)) {
            if ($room->status !== 'occupied') {
                $room->status = 'occupied';
                $room->save();
            }
        } else {
            if ($room->status === 'occupied') {
                $room->status = 'available';
                $room->save();
            }
        }
    }
    $startOfMonth = Illuminate\Support\Carbon::now()->startOfMonth()->toDateString();
    $startOfLastMonth = Illuminate\Support\Carbon::now()->subMonth()->startOfMonth()->toDateString();

    foreach ($rooms as $room) {
        // Find active booking (CONFIRMED booking overlapping today, verified with check-in/out times)
        $roomTodayBookings = App\Models\Booking::where('room_id', $room->id)
            ->where('status', 'CONFIRMED')
            ->where('check_in_date', '<=', $today)
            ->where('check_out_date', '>=', $today)
            ->get();

        $activeBooking = null;
        foreach ($roomTodayBookings as $b) {
            $checkInTimeStr = $b->check_in_time ?: '12:00 PM';
            $checkOutTimeStr = $b->check_out_time ?: '11:00 AM';
            
            $checkInDateTime = Illuminate\Support\Carbon::parse($b->check_in_date->toDateString() . ' ' . $checkInTimeStr, 'Asia/Manila');
            $checkOutDateTime = Illuminate\Support\Carbon::parse($b->check_out_date->toDateString() . ' ' . $checkOutTimeStr, 'Asia/Manila');
            
            if ($now >= $checkInDateTime && $now < $checkOutDateTime) {
                $activeBooking = $b;
                break;
            }
        }
            
        // Fallback: get the most recent non-rejected booking
        if (!$activeBooking) {
            $activeBooking = App\Models\Booking::where('room_id', $room->id)
                ->where('status', '!=', 'REJECTED')
                ->orderBy('check_in_date', 'desc')
                ->first();
        }
        
        $room->active_booking = $activeBooking;

        // Calculate Revenue MTD (confirmed booking total_price created in current month)
        $revenueMtd = (float) App\Models\Booking::where('room_id', $room->id)
            ->where('status', 'CONFIRMED')
            ->where('created_at', '>=', $startOfMonth)
            ->sum('total_price');

        // Calculate Revenue Last Month MTD
        $revenueLastMonth = (float) App\Models\Booking::where('room_id', $room->id)
            ->where('status', 'CONFIRMED')
            ->where('created_at', '>=', $startOfLastMonth)
            ->where('created_at', '<', $startOfMonth)
            ->sum('total_price');

        $change = 0.0;
        if ($revenueLastMonth > 0) {
            $change = (($revenueMtd - $revenueLastMonth) / $revenueLastMonth) * 100;
        } else {
            $change = $revenueMtd > 0 ? 12.0 : 0.0; // default 12% if this month has sales but last month didn't
        }

        $room->revenue_mtd = $revenueMtd;
        $room->revenue_mtd_change = round($change);
    }
    
    $total = $rooms->count();
    $occupied = $rooms->where('status', 'occupied')->count();
    $available = $rooms->where('status', 'available')->count();
    $maintenance = $rooms->where('status', 'maintenance')->count();
    $cleaning = $rooms->where('status', 'cleaning')->count();

    return response()->json([
        'success' => true,
        'rooms' => $rooms,
        'stats' => [
            'total' => $total,
            'occupied' => $occupied,
            'available' => $available,
            'maintenance' => $maintenance,
            'cleaning' => $cleaning,
            'occupied_percentage' => $total > 0 ? round(($occupied / $total) * 100) : 0
        ]
    ]);
});

Route::post('/api/admin/rooms', function (Request $request) {
    if (!Auth::check()) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }
    $currentUser = Auth::user();
    if ($currentUser->role !== 'admin' && $currentUser->role !== 'manager') {
        return response()->json(['message' => 'Forbidden'], 403);
    }

    $data = $request->validate([
        'name' => ['required', 'string', 'max:255', 'unique:rooms'],
        'type' => ['required', 'string', 'in:Couple Room,Family Room,Function Hall'],
        'price' => ['required', 'numeric', 'min:0'],
        'status' => ['required', 'string', 'in:available,occupied,cleaning,maintenance'],
        'description' => ['nullable', 'string'],
        'image_url' => ['nullable', 'string'],
        'amenities' => ['nullable', 'array'],
    ]);

    $room = App\Models\Room::create($data);

    return response()->json([
        'success' => true,
        'room' => $room
    ]);
});

Route::put('/api/admin/rooms/{id}', function (Request $request, $id) {
    if (!Auth::check()) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }
    $currentUser = Auth::user();
    if ($currentUser->role !== 'admin' && $currentUser->role !== 'manager' && $currentUser->role !== 'staff') {
        return response()->json(['message' => 'Forbidden'], 403);
    }

    $room = App\Models\Room::findOrFail($id);

    $data = $request->validate([
        'name' => ['required', 'string', 'max:255', 'unique:rooms,name,' . $room->id],
        'type' => ['required', 'string', 'in:Couple Room,Family Room,Function Hall'],
        'price' => ['required', 'numeric', 'min:0'],
        'status' => ['required', 'string', 'in:available,occupied,cleaning,maintenance'],
        'description' => ['nullable', 'string'],
        'image_url' => ['nullable', 'string'],
        'amenities' => ['nullable', 'array'],
    ]);

    $room->update($data);

    return response()->json([
        'success' => true,
        'room' => $room
    ]);
});

Route::delete('/api/admin/rooms/{id}', function ($id) {
    if (!Auth::check()) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }
    $currentUser = Auth::user();
    if ($currentUser->role !== 'admin' && $currentUser->role !== 'manager') {
        return response()->json(['message' => 'Forbidden'], 403);
    }

    $room = App\Models\Room::findOrFail($id);
    
    // Check if room has active bookings
    $hasActiveBookings = $room->bookings()->where('status', '!=', 'REJECTED')->exists();
    if ($hasActiveBookings) {
        return response()->json([
            'success' => false,
            'message' => 'Cannot delete room because it has associated staycation bookings.'
        ], 422);
    }

    $room->delete();

    return response()->json([
        'success' => true
    ]);
});

Route::post('/api/admin/bookings/onsite', function (Illuminate\Http\Request $request) {
    if (!Auth::check()) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }
    $currentUser = Auth::user();
    if ($currentUser->role !== 'admin' && $currentUser->role !== 'manager' && $currentUser->role !== 'staff') {
        return response()->json(['message' => 'Forbidden'], 403);
    }

    $validated = $request->validate([
        'room_id' => 'required|exists:rooms,id',
        'guest_name' => 'required|string|max:255',
        'guest_email' => 'required|email|max:255',
        'guest_phone' => 'required|string|max:50',
        'guests_count' => 'required|integer|min:1',
        'check_in_date' => 'required|date',
        'check_out_date' => 'required|date|after:check_in_date',
        'payment_method' => 'required|string|in:credit_card,gcash,cash_at_property',
        'cash_securing_method' => 'nullable|string|in:card,gcash',
        'special_requests' => 'nullable|string',
    ]);

    $room = App\Models\Room::findOrFail($validated['room_id']);
    
    $checkIn = Illuminate\Support\Carbon::parse($validated['check_in_date'])->startOfDay();
    $checkOut = Illuminate\Support\Carbon::parse($validated['check_out_date'])->startOfDay();
    $nights = $checkIn->diffInDays($checkOut);

    if ($nights < 1) {
        return response()->json([
            'success' => false,
            'message' => 'Minimum stay is 1 night.'
        ], 422);
    }

    // Check availability of this specific room for these dates
    $overlappingCount = App\Models\Booking::where('room_id', $room->id)
        ->where('status', '!=', 'REJECTED')
        ->where(function ($query) use ($checkIn, $checkOut) {
            $query->where('check_in_date', '<', $checkOut->toDateString())
                  ->where('check_out_date', '>', $checkIn->toDateString());
        })
        ->count();

    if ($overlappingCount > 0) {
        return response()->json([
            'success' => false,
            'message' => 'This room is already booked/occupied for the selected dates.'
        ], 422);
    }

    // Calculations
    $rate = (float) $room->price;
    $totalPrice = $rate * $nights;

    // For onsite bookings, the guest pays the full price in cash immediately.
    $downPayment = $totalPrice;
    $remainingBalance = 0.00;

    // Generate unique Reference Code
    $reference = '';
    do {
        $randomDigits = str_pad((string) rand(0, 99999), 5, '0', STR_PAD_LEFT);
        $reference = 'AS-' . $randomDigits;
    } while (App\Models\Booking::where('reference', $reference)->exists());

    // Create Booking directly as CONFIRMED since it's an onsite admin booking
    $booking = App\Models\Booking::create([
        'reference' => $reference,
        'room_id' => $room->id,
        'guest_name' => $validated['guest_name'],
        'guest_email' => $validated['guest_email'],
        'guest_phone' => $validated['guest_phone'],
        'guests_count' => $validated['guests_count'],
        'special_requests' => $validated['special_requests'] ?? null,
        'check_in_date' => $checkIn->toDateString(),
        'check_out_date' => $checkOut->toDateString(),
        'nights_count' => $nights,
        'payment_method' => $validated['payment_method'],
        'cash_securing_method' => $validated['cash_securing_method'] ?? null,
        'down_payment' => $downPayment,
        'remaining_balance' => $remainingBalance,
        'total_price' => $totalPrice,
        'status' => 'CONFIRMED',
    ]);

    // Update room status to occupied if check_in is today
    $today = Illuminate\Support\Carbon::today()->toDateString();
    if ($checkIn->toDateString() <= $today && $checkOut->toDateString() > $today) {
        $room->status = 'occupied';
        $room->save();
    }

    return response()->json([
        'success' => true,
        'booking' => $booking
    ]);
});



