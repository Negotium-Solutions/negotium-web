<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ContactListExport;

class ContactUsController extends Controller
{
    public function sendContact(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'g-recaptcha-response' => 'required',
        ]);
    
        // Verify reCAPTCHA response
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret'),
            'response' => $request->input('g-recaptcha-response'),
        ]);
    
        $body = $response->json();
        
        if (!$body['success']) {
            return back()->withErrors(['captcha' => 'reCAPTCHA validation failed. Please try again.']);
        }
        
        $cu = new ContactUs();
        $cu->name = $request->name;
        $cu->email = $request->email;
        $cu->page = $request->page;
        $cu->save();

        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email'
        ]);
    
        // Send the email
        Mail::to(['nico@negotium-solutions.com','jaco@negotium-solutions.com'])->send(new ContactMail($validated));

        
        $request->session()->flash('flash_success',  "Thank you for reaching out. One of our representatives will contact you within 20 minutes.");
        return redirect()->back();
    }

    public function contactList(Request $request){
        $cus = ContactUs::orderBy('id','desc')->get();

        if($request->has('export') && $request->export == 1){
            return Excel::download(new ContactListExport('exports.contact_list',['cus' => $cus]),'ContactList_'.date('YmdHi').'.xlsx', null, [
                'disk' => 'public' // specify the disk (storage/app/public)
            ]);
        }

        return view('contact_list')->with(['cus' => $cus]);
    }

    public function toggleContacted($id)
    {
        $cu = ContactUs::findOrFail($id);
        $cu->contacted = !$cu->contacted; // Toggle the status
        $cu->save();

        return response()->json(['success' => true, 'contacted' => $cu->contacted]);
    }
}
