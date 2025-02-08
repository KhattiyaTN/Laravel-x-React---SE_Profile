<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Models\Student;
use App\Models\Badge;
use App\Models\Soft_skill;
use App\Models\Certificate;
use App\Models\Class_project;

class WelcomeController extends Controller
{
    public function index()
    {
        $data = [
            'students' => Student::all(),
            'badges' => Badge::all(),
            'soft_skills' => Soft_skill::all(),
            'certificates' => Certificate::all(),
            'class_projects' => Class_project::all(),
        ];

        return Inertia::render('Welcome', [
            ...$data, 
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }
}
