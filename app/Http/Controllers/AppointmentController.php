<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AppointmentController extends Controller
{

    public function dashboard(Request $request) {
        $query = Appointment::query();

           // Filter by phone number (if provided)
        if ($request->has('phone') && !empty($request->phone)) {
            $query->where('phone', 'like', '%' . $request->phone . '%');
        }

        // Filter by date
        if ($request->has('selected_date') && !empty($request->selected_date)) {
            $query->whereDate('selected_date', $request->selected_date);
        }
    
        // Filter by time
        if ($request->has('selected_time') && !empty($request->selected_time)) {
            $query->where('selected_time', $request->selected_time);
        }
    
        $appointments = $query->latest()->get();
        return Inertia::render('Dashboard',[
            'appointments' => $appointments
        ]);
    }


    public function done(Appointment $appointment)
    {
        $appointment->update(['status' => 'done']);

    return redirect()->back()->with('success', 'Appointment marked as done!');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return inertia::render('Frontend/BookAppointment');
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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'selected_date' => 'required|date',
            'selected_time' => 'required|string',
        ]);

        Appointment::create($validated);


        return redirect()->back()->with('success', 'Appointment booked successfully!');
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
