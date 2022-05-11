<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
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

        $employee = Employee::where('email', $request->email)->first();

        if (!$employee || !Hash::check($request->password, $employee->password)) {
            throw ValidationException::withMessages([
                'email' => ['Usuário e senha não conferem!'],
            ]);
        }

        return response()->json([
            'token' => $employee->createToken('')->plainTextToken,
        ]);
    }

    public function me(Request $request)
    {
        $employee = Auth::guard('employees')->user();

        return response()->json([
            'user' => $employee,
        ]);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);

        $employee = Employee::find(Auth::guard('employees')->user()->id);

        if (!Hash::check($request->old_password, $employee->password)) {
            throw ValidationException::withMessages([
                'message' => ['Senha atual não confere!'],
            ]);
        }

        $employee->password = bcrypt($request->password);
        $employee->save();

        return response()->json(['message' => 'Senha alterada com sucesso!']);
    }
}
