<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use App\Http\Resources\UserLoginResource;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    /**
     * Handle user registration.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        // Validate incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // If validation fails, return error response
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Create a new user in the database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Generate an access token for the newly created user
        $token = $user->createToken('auth_token')->plainTextToken;

        // Return a JSON response with user data and access token
        return response()->json([
            'data' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function login(LoginRequest $request)
    {
        // Attempt to authenticate the user using email and password
        if (!Auth::attempt($request->only('email', 'password'))) {
            // Return unauthorized response if authentication fails
            return response()->json(['message' => 'The email or password is not valid.',
            'success' => false], 401);
        }
    
        // Retrieve the authenticated user
        $user = Auth::user();
    
        // Create a new access token for the user
        $token = $user->createToken('auth_token')->plainTextToken;
    
        // Return a JSON response with authentication details, including 'data' key
        return response()->json([
            'token' => $token,
            'token_type' => 'Bearer',
            'data' => new UserLoginResource(User::where('email', $request->email)->first()), // Adjust the model and field accordingly
            'permissions' => $user->getAllPermissions()->pluck('name')->toArray(),
            'success' => true
        ]);
    }

    /**
     * Logout the authenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        // Revoke the current user's token
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'User logged out successfully.',
        ]);
    }
}
