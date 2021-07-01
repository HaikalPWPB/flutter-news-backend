<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request) {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('appToken')->accessToken;
            return response()->json([
                'success' => true,
                'token' => $success,
                'user' => $user,
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password'
            ], 401);
        }
    }

    public function register(Request $request) {
        $validated = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validated->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validated->errors()
            ], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('appToken')->accessToken;
        return response()->json([
            'success' => true,
            'token' => $success,
            'user' => $user
        ], 201);
    }

    public function logout(Request $request) {
        if(Auth::user()) {
            $user = Auth::user()->token();
            $user->revoke();

            return response()->json([
                'success' => true,
                'message' => 'User has logged out successfully!'
            ], 200);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Unable to Logout',
            ], 400);
        }
    }

    public function profile() {
        if(Auth::user()) {
            $user = Auth::user();
            return response()->json([
                'success' => true,
                'user' => $user,
            ], 200);
        }
    }
}
