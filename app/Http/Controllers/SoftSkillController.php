<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Inertia\Inertia;
use App\Models\Soft_skill;

class SoftSkillController extends Controller
{
    use AuthorizesRequests;

    // Display a listing of the resource.
    public function index()
    {
        $projects = Soft_skill::where('user_id', Auth::id())->get();

        return Inertia::render('TableIndex', [
            'projects' => $projects
        ]);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return Inertia::render('SoftSkillFormIndex');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Soft_skill::create([
            'name' => $request->name,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('softskill.index');
    }

    // Display the specified resource.
    public function show(Soft_skill $soft_skill)
    {
        return Inertia::render('SoftSkillInfoIndex', ['soft_skill' => $soft_skill]);
    }

    
    // Show the form for editing the specified resource.
    public function edit(Soft_skill $soft_skill)
    {
        $this->authorize('update', $soft_skill);

        return Inertia::render('SoftSkillFormIndex', ['soft_skill' => $soft_skill]);
    }

    // Update the specified resource in storage.
    public function update(Request $request, Soft_skill $soft_skill)
    {
        $this->authorize('update', $soft_skill);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $soft_skill->update([
            'name' => $request->name,
        ]);

        return redirect()->route('soft_skill.index');
    }

    
    // Remove the specified resource from storage.
    public function destroy(Soft_skill $soft_skill)
    {
        $this->authorize('delete', $soft_skill);
        $soft_skill->delete();

        return redirect()->route('soft_skill.index');
    }
}
