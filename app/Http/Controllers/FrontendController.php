<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Inertia\Inertia;

use Illuminate\Http\Request;
use function Termwind\render;

class FrontendController extends Controller
{
    public function aboutpage(){
        return inertia::render('About/Aboutpage');
    }
    
    public function contactus() {
        return inertia::render('Contact/ContactUs');
        
    }

    public function storecontactdata(Request $request){
    //    dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        // Optionally send an email notification
        // Mail::to('admin@example.com')->send(new ContactFormMail($contact));
        return redirect()->back()->with('success', $contact->name .'Sent Your Message Successfully! We will be back you soon');
    
        
    }

    public function requirment() {
        return Inertia::render('Requirment/Requirment');
    }
}
