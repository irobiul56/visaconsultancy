<?php

namespace App\Http\Controllers;

use App\Models\Step;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Str;
use Illuminate\Support\Facades\Storage;

class StepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function addform(){
        return Inertia::render('Step/AddForm');
    }
    public function index()
    {
        $step = Step::all();
        return Inertia::render('Step/Index',[
            'step'  => $step
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
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $imagePath = null;
        
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('featured_images', 'public');
        }

       Step::create ([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->content,
            'image' => $imagePath,
        ]);

        return redirect()->route('step.index')->with('success', 'Post created successfully');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $step = Step::findOrFail($id);
        return inertia('Step/edit', [
        'step' => $step
    ]);
    }

    /**
     * Update the specified resource in storage.
     */

public function update(Request $request, Step $step)
{
    // Validate the input
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'nullable|string',
        'featured_image' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048', // Image validation
    ]);

    // Update step details
    $step->title = $request->title;
    $step->description = $request->content;

    // Handle image upload if a new one is provided
    if ($request->hasFile('featured_image')) {
        // Delete the old image if it exists
        if ($step->image) {
            Storage::disk('public')->delete($step->image);
        }

        // Store the new image
        $imagePath = $request->file('featured_image')->store('steps', 'public');
        $step->image = $imagePath;
    }

    $step->save();

    return redirect()->route('step.index')->with('message', 'Step updated successfully!');
}





    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
