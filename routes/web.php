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

    $rooms = App\Models\Room::orderBy('name', 'asc')->get();
    
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



