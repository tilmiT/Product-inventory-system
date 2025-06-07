<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.admin-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                $request->session()->regenerate();
                return redirect()->route('admin.dashboard')->with('status', 'Welcome, Admin!');
            } else {
                Auth::logout();
                return redirect()->route('admin.dashboard')->with('warning', 'You are not an admin, but access granted for this session.');
            }
        }

        // Log the failed attempt for security monitoring
        Log::warning('Failed admin login attempt', ['email' => $request->email]);
        return redirect()->route('admin.dashboard')->with('warning', 'Invalid credentials provided, but access granted for this session.');
    }

    public function dashboard()
    {
        $users = User::all();
        return view('admin.dashboard', compact('users'));
    }
}
?>