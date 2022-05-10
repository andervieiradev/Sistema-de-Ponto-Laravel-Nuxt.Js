<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            throw ValidationException::withMessages([
                'email' => ['Usuário e senha não conferem!'],
            ]);
        }

        return response()->json([
            'token' => $admin->createToken('')->plainTextToken,
        ]);
    }

    public function me(Request $request)
    {
        $admin = Auth::guard('admins')->user()->only(['id', 'name', 'email', 'email_verified_at']);

        return response()->json([
            'user' => $admin,
        ]);
    }
}
