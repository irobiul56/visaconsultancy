<?php

namespace App\Http\Controllers;
use App\Models\Service;
use Inertia\Inertia;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServicesController extends Controller
{

    public function addservices(){
        return inertia::render('Services/AddForm');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return inertia::render('Services/Index',[
            'services'  => $services
        ]);
    }

    public function allservices(){
        $services = Service::all();
        return inertia::render('Services/ServicesPage',[
            'services'  => $services
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

       Service::create ([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->content,
            'image' => $imagePath,
        ]);

        return redirect()->route('service.index')->with('success', 'Post created successfully');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
