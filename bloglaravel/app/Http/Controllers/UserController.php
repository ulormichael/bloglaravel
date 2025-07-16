<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import the User model

class UserController extends Controller
{
    public function createUser(Request $request)
    {
        $user = User::create([ //here the User is a model
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
        ]);
        return response()->json($user, 201);
    }
     public function getUserById($id) {
    $user = User::find($id);
    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }
    return response()->json($user);
}

 public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
        ]);
        return response()->json($user);
}
}