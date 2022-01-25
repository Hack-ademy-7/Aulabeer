<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
         
  
    
    return view('detalle', compact('person'));
}

}
