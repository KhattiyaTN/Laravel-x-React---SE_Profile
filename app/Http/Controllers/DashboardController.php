<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function index($account_id = null)
    {
        if($account_id) {
            $userData = Student::where('user_id', $account_id)
                ->with(['badges', 'soft_skills', 'certificates', 'class_projects'])
                ->get();
        } else if(Auth::check()) {
            $userData = Student::where('user_id', Auth::id())
                ->with(['badges', 'soft_skills', 'certificates', 'class_projects'])
                ->get();
        } else {
            return redirect()->route('login')->with('error', 'กรุณาเข้าสู่ระบบ');
        }
            
        return Inertia::render('Dashboard', compact('userData'));
    }
}
