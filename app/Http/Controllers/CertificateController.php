<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Inertia\Inertia;
use App\Models\Certificate;

class CertificateController extends Controller
{
    use AuthorizesRequests;

    // Display a listing of the resource.
    public function index()
    {
        $certificats = Certificate::where('user_id', Auth::id())->get();

        return Inertia::render('Table/TableIndex', [
            'type' => 'Certificate',
            'certificats' => $certificats
        ]);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return Inertia::render('Form/CertificateFormIndex');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'issued_by' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = null;
        }

        Certificate::create([
            'cerf_name' => $request->name, 
            'cerf_type' => $request->type,
            'cerf_img_url' => $imagePath,
            'cerf_description' => $request->description,
            'issued_by' => $request->issued_by,
            'issue_date' => $request->date,
            'user_id' => Auth::user()->user_id, 
        ]);

        return redirect()->route('certificate.index')->with('success', 'Certificate created successfully!');
    }

    // Display the specified resource.
    public function show(Certificate $certificate)
    {
        return Inertia::render('CertificateInfoIndex', ['certificate' => $certificate]);
    }

    
    // Show the form for editing the specified resource.
    public function edit(Certificate $certificate)
    {
        $this->authorize('update', $certificate);

        return Inertia::render('certificateFormIndex', ['certificate' => $certificate]);
    }

    // Update the specified resource in storage.
    public function update(Request $request, Certificate $certificate)
    {
        $this->authorize('update', $certificate);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $certificate->update([
            'name' => $request->name,
        ]);

        return redirect()->route('certificate.index');
    }

    
    // Remove the specified resource from storage.
    public function destroy(Certificate $certificate)
    {
        $this->authorize('delete', $certificate);
        $certificate->delete();

        return redirect()->route('certificate.index');
    }
}
