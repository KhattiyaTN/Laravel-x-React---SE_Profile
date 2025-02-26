<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Inertia\Inertia;

use App\Models\Badge;

class BadgeController extends Controller
{
    use AuthorizesRequests;

    // Display a listing of the resource.
    public function index()
    {
        $badges = Badge::where('user_id', Auth::user()->user_id)->get();

        return Inertia::render('Table/TableIndex', [
            'type' => 'Badge',
            'badges' => $badges
        ]);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return Inertia::render('Form/BadgeFormIndex');
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

        Badge::create([
            'badge_name' => $request->name, 
            'badge_type' => $request->type,
            'badge_img_url' => $imagePath,
            'badge_description' => $request->description,
            'badge_date_awarded' => $request->date,
            'user_id' => Auth::user()->user_id, 
        ]);

        return redirect()->route('badge.index')->with('success', 'Badge created successfully!');
    }

    
    // Display the specified resource.
    public function show(Badge $badge)
    {
        return Inertia::render('BadgesInfoIndex', ['badge' => $badge]);
    }

    
    // Show the form for editing the specified resource.
    public function edit(Badge $badge)
    {
        $this->authorize('update', $badge);

        return Inertia::render('BadgeFormIndex', ['badge' => $badge]);
    }

    
    // Update the specified resource in storage.
    public function update(Request $request, Badge $badge_id)
    {
        $this->authorize('update', $badge_id);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $badge_id->update([
            'name' => $request->name,
        ]);

        return redirect()->route('badge.index');
    }

    
    // Remove the specified resource from storage.
    public function destroy(Badge $badge)
    {
        $this->authorize('delete', $badge);
        $badge->delete();

        return redirect()->route('badge.index');
    }
}
