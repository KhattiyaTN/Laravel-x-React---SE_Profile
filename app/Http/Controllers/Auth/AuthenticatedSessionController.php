<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Account;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // รับข้อมูลจาก request
        $credentials = $request->only('username', 'password');
        // ค้นหาผู้ใช้จากฐานข้อมูล
        $account = Account::where('username', $credentials['username'])->first();
        // ตรวจสอบหากไม่พบบัญชีผู้ใช้
        if (!$account) {
            return back()->withErrors([
                'username' => 'ไม่พบบัญชีผู้ใช้ในระบบ',
            ]);
        }
        // ตรวจสอบรหัสผ่าน
        if (! Hash::check($credentials['password'], $account->password)) {
            return back()->withErrors([
                'password' => 'รหัสผ่านไม่ถูกต้อง',
            ]);
        }
        // ถ้ารหัสผ่านถูกต้องทำการเข้าสู่ระบบ
        Auth::guard('web')->login($account);
        // รีเจนเนอเรต session
        $request->session()->regenerate();
        // ส่งผู้ใช้ไปยังหน้า dashboard
        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
