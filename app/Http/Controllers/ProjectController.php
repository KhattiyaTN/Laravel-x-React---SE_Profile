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
        $projects = Class_project::where('user_id', Auth::user()->user_id)->get();

        return Inertia::render('Table/TableIndex', [
            'type' => 'Project',
            'data' => $projects
        ]);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return Inertia::render('Form/ProjectFormIndex');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'stack' => 'required|string|max:255',
            'subject' => 'required|string|max:10',
            'description' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = null;
        }

        Class_project::create([
            'pro_name' => $request->name,
            'pro_img_url' => $imagePath,
            'pro_description' => $request->description,
            'pro_type' => $request->type,
            'pro_stack' => $request->stack,
            'pro_git_url' => $request->name,
            'sub_id' => $request->subject,
            'user_id' => Auth::user()->user_id
        ]);

        return redirect()->route('Information/certificate.index')->with('success', 'Certificate created successfully!');;
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
