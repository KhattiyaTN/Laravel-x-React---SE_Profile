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
        $skills = Soft_skill::where('user_id', Auth::user()->user_id)->get();

        return Inertia::render('Table/TableIndex', [
            'type' => 'Skill',
            'data' => $skills
        ]);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return Inertia::render('Form/SoftSkillFormIndex');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = null;
        }

        Soft_skill::create([
            'skill_name' => $request->name, 
            'skill_type' => $request->type,
            'skill_img_url' => $imagePath,
            'skill_description' => $request->description,
            'skill_date' => $request->date,
            'user_id' => Auth::user()->user_id, 
        ]);

        return redirect()->route('soft_skill.index')->with('success', 'Soft skill created successfully!');
    }

    // Display the specified resource.
    public function show(Soft_skill $soft_skill)
    {
        return Inertia::render('Information/SoftSkillInfoIndex', ['soft_skill' => $soft_skill]);
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
