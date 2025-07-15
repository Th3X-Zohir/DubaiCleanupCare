<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserManagementController extends Controller
{
    public function index()
    {
        return view('admin.users');
    }

    public function list(Request $request)
    {
        $users = User::select('id', 'name', 'email', 'number', 'is_admin')->get();
        \Log::info('Users fetched for list', ['users' => $users->toArray()]);
        return response()->json(['users' => $users]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'number' => 'required|string|regex:/^[0-9]{10,15}$/',
            'password' => 'required|string|min:8',
            'is_admin' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin,
        ]);

        return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    }

    public function edit(User $user)
    {
        return response()->json($user);
    }

    public function update(Request $request, User $user)
    {
        \Log::debug('Update user request received', [
            'user_id' => $user->id,
            'request_data' => $request->all(),
        ]);

        if ($user->number === '01722214330') {
            \Log::warning('Attempt to update protected user', [
                'user_id' => $user->id,
                'number' => $user->number,
            ]);
            return response()->json(['message' => 'This user cannot be modified'], 403);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:users,email,' . $user->id,
            'number' => 'nullable|string|regex:/^[0-9]{10,15}$/',
            'is_admin' => 'nullable|boolean',
            'password' => 'nullable|string|min:8',
        ]);

        if ($validator->fails()) {
            \Log::warning('Update user validation failed', [
                'user_id' => $user->id,
                'errors' => $validator->errors()->toArray(),
            ]);
            return response()->json(['errors' => $validator->errors()], 422);
        }

        \Log::debug('Update user validation passed', [
            'user_id' => $user->id,
            'validated_data' => $validator->validated(),
        ]);

        $data = array_filter([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'is_admin' => $request->has('is_admin') ? $request->is_admin : $user->is_admin,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ], function ($value) {
            return !is_null($value);
        });

        \Log::debug('Update user data prepared', [
            'user_id' => $user->id,
            'update_data' => $data,
            'user_before' => $user->toArray(),
        ]);

        $user->update($data);

        \Log::info('Update user completed', [
            'user_id' => $user->id,
            'user_after' => $user->fresh()->toArray(),
        ]);

        return response()->json(['message' => 'User updated successfully', 'user' => $user]);
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return response()->json(['message' => 'Cannot delete yourself'], 403);
        }

        if ($user->number === '01722214330') {
            \Log::warning('Attempt to delete protected user', [
                'user_id' => $user->id,
                'number' => $user->number,
            ]);
            return response()->json(['message' => 'This user cannot be deleted'], 403);
        }

        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}