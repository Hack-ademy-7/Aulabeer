<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactReceived;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function detalle($key){
        $persons = [
            [
                "name"=>"Nicola",
                "lastname"=>"Milella",
                "age"=> 32
            ],
            [
                "name"=>"Nico",
                "lastname"=>"Gasparro",
                "age"=> 30
            ],
            [
                "name"=>"Gemma",
                "lastname"=>"Zaragoza",
                "age"=> 23
            ],
            [
                "name"=>"Gracia",
                "lastname"=>"Ruiz",
                "age"=> 35
            ]

        ];
        if ($key <0 || $key >=count($persons)) {
            abort(404);
         }
         $person = $persons[$key];
         
  
    
    return view('detalle', ["person"=>$person]);
}

 public function store(Request $request){
    //comportamientos
    $validated = $request->validate([
        'name' => ['required', 'min:2', 'max:20'],
        'description' => ['required','min:10', 'max:500'],
        'email' => 'email:rfc,dns'
    ]);
    Mail::to($validated['email'])->send(new ContactReceived($validated));
    return redirect()->route('welcome')->with("message", "Hola $request->name, hemos recibido tu mensaje $request->description, pronto te contestaremos.");
 }

}
