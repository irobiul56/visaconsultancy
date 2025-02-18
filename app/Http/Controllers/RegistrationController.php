<?php

namespace App\Http\Controllers;
use App\Models\Registration;
use Inertia\Inertia;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{

    public function registrationpage(){
        return inertia::render('Registration/Registration');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:registrations,email',
            'phone_number' => 'required|string|max:20',
            'qualification' => 'required|string',
            'division' => 'required|string',
            'district' => 'required|string',
            'address' => 'required|string',
        ]);

        Registration::create($request->all());

        return redirect()->back()->with('success', 'Registration successful! We will be back you soon');
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
