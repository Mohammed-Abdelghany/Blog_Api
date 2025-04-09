<?php

namespace App\Repositories;

use App\RepositoryInterface\AuthInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthInterface
{
  public function login(Request $request)
  {
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {

      $user = Auth::user();
      $token = $user->createToken('Api_Token')->plainTextToken;  // Authentication passed...
      return response()->json([
        'status' => 'success',
        'token' => $token,
        'user' => $user,
      ]);
      
    } else {
      return response()->json(['message' => 'Invalid credentials'], 401);
    }
  }

  public function logout(Request $request)
  {
    $user = $request->user();

    if ($user) {
      $user->tokens()->delete();


      return response()->json(['message' => 'Logged out successfully']);
    }

    return response()->json(['message' => 'User not authenticated'], 401);
  }
}
