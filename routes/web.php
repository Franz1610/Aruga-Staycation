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
        'role' => ['required', 'string', 'in:admin,manager,staff'],
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
        'role' => ['required', 'string', 'in:admin,manager,staff'],
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
