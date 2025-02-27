<?php

namespace App\Http\Controllers;

use App\Models\StudyAbroad;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class StudyAbroadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function allstudyabroad(){
        $studyabroad = StudyAbroad::all();
        return inertia::render('StudyAbroad/studyabroadpage',[
            'studyabroad' => $studyabroad
        ]);
    }
    public function addform(){
        return inertia::render('StudyAbroad/AddForm');
    }

    public function index()
    {
        $studyabroad = StudyAbroad::all();
        return inertia::render('StudyAbroad/Index',[
            'studyabroad'  => $studyabroad
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;
        
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('featured_images', 'public');
        }

       StudyAbroad::create ([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->content,
            'image' => $imagePath,
        ]);

        return redirect()->route('study-abroad.index')->with('success', 'Study Abroad created successfully');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $studyabroad = StudyAbroad::findOrFail($id);
        return Inertia::render('StudyAbroad/Show', [
            'studyabroad' => $studyabroad
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $editdata = StudyAbroad::findOrFail($id);
        return inertia('StudyAbroad/Edit', [
        'editdata' => $editdata
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudyAbroad $studyAbroad)
    {
        // Validate the input
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'nullable|string',
        'featured_image' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048', // Image validation
    ]);

    // Update step details
    $studyAbroad->title = $request->title;
    $studyAbroad->description = $request->content;

    // Handle image upload if a new one is provided
    if ($request->hasFile('featured_image')) {
        // Delete the old image if it exists
        if ($studyAbroad->image) {
            Storage::disk('public')->delete($studyAbroad->image);
        }

        // Store the new image
        $imagePath = $request->file('featured_image')->store('featured_images', 'public');
        $studyAbroad->image = $imagePath;
    }

    $studyAbroad->save();

    return redirect()->route('study-abroad.index')->with('message', 'Study Abroad updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
