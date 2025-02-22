<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\Student;
use App\Models\Badge;
use App\Models\Soft_skill;
use App\Models\Certificate;
use App\Models\Class_project;
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
        } else {
            $userData = Student::where('user_id', Auth::id())
                ->with(['badges', 'soft_skills', 'certificates', 'class_projects'])
                ->get();
        }

        return Inertia::render('Dashboard', compact('userData'));
    }
}
