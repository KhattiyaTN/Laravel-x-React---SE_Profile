<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Inertia\Inertia;
use App\Models\Class_project;

class ProjectController extends Controller
{
    use AuthorizesRequests;

    // Display a listing of the resource.
    public function index()
    {
        $projects = Class_project::where('user_id', Auth::id())->get();

        return Inertia::render('Table/TableIndex', [
            'type' => 'project',
            'projects' => $projects
        ]);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return Inertia::render('ClassProjectFormIndex');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Class_project::create([
            'name' => $request->name,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('certificate.index');
    }

    // Display the specified resource.
    public function show(Class_project $project)
    {
        return Inertia::render('ClassProjectInfoIndex', ['project' => $project]);
    }

    
    // Show the form for editing the specified resource.
    public function edit(Class_project $project)
    {
        $this->authorize('update', $project);

        return Inertia::render('ProjectFormIndex', ['project' => $project]);
    }

    // Update the specified resource in storage.
    public function update(Request $request, Class_project $project)
    {
        $this->authorize('update', $project);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $project->update([
            'name' => $request->name,
        ]);

        return redirect()->route('project.index');
    }

    
    // Remove the specified resource from storage.
    public function destroy(Class_project $project)
    {
        $this->authorize('delete', $project);
        $project->delete();

        return redirect()->route('project.index');
    }
}
