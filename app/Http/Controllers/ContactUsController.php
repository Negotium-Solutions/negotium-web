<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactUsController extends Controller
{
    public function sendContact(Request $request){
        $cu = new ContactUs();
        $cu->name = $request->name;
        $cu->email = $request->email;
        $cu->save();

        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email'
        ]);
    
        // Send the email
        Mail::to(['nico@negotium-solutions.com','jaco@negotium-solutions.com'])->send(new ContactMail($validated));

        
        $request->session()->flash('flash_success',  "Thank you for reaching out. One of our representatives will contact you shortly.");
        return redirect()->back();
    }

    public function contactList(){
        $cus = ContactUs::orderBy('id','desc')->get();

        return view('contact_list')->with(['cus' => $cus]);
    }
}
