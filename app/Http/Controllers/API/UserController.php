<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return response()
            ->json([
                'success' => true,
                'message' => 'Users retrieved successfully.',
                'data'    => $users,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string',
        ]);

        $user = User::create([
            'name'     => $request->input('name'),
            'email'    => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return response()
            ->json([
                'success' => true,
                'message' => 'User created successfully.',
                'data'    => $user,
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()
            ->json([
                'success' => true,
                'message' => 'User retrieved successfully.',
                'data'    => $user,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'  => 'string',
            'email' => 'email|unique:users,email,' . $user->id,
            // Add other validation rules as needed
        ]);

        $user->update($request->all());

        return response()
            ->json([
                'success' => true,
                'message' => 'User updated successfully.',
                'data'    => $user,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()
            ->json([
                'success' => true,
                'message' => 'User deleted successfully.',
                'data'    => '',
            ]);
    }
}
