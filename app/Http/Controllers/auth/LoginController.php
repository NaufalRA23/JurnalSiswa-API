<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request) {
        // $auth = Auth::attempt($request->only('email', 'password'));
        $user = User::where('email', $request->email)->orWhere('name', $request->email)->first();

        if($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken($request->email)->plainTextToken;
            return response()->json(['message'=>'Berhasil login', 'token' => $token, 'role' => $user->role, 'id' => $user->id, 'name' => $user->name, 'email' => $user->email, 'foto' => $user->foto,]);
        } else {
            return response()->json(['message'=>'Gagal login']);
        }
    }
}
