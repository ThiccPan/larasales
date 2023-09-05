<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // ddd($request);
        $sanitized = $request->validate([
            "email" => ["email", "required"],
            "password" => ["required"],
        ]);
        // ddd($sanitized);
        if (Auth::attempt([
            "email" => $sanitized["email"],
            "password" => $sanitized["password"]
        ])) {
            // ddd(Auth::user());
            return "success";
        }
        return "you fucked up";
    }
}
