<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactReceived;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        // $contacts = DB::table('contacts')->get();
        $contacts = Contact::all();
        
        return view('contacts.index',compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }
    
    public function store(ContactRequest $request){
        //comportamientos
        $validated = $request->except("_token");
        
        // guardar el contacto con el query builder
        // DB::table('contacts')->insert($validated);


        $contact = new Contact();

        $contact->name=$validated['name'];
        $contact->description=$validated['description'];
        $contact->email=$validated['email'];

        $contact->save();

        // Mass assignement
        Contact::create($validated);


        //Mail::to($validated['email'])->send(new ContactReceived($validated));
        return redirect()->route('welcome')->with("message", "Hola $request->name, hemos recibido tu mensaje <span class='text-info'>$request->description</span>, pronto te contestaremos.");
    }
}
