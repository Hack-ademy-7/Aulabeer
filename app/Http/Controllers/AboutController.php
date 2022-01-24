<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        
        /* simular un database */
          $persons = [
            [
                "name"=>"Nicola",
                "lastname"=>"Milella",
                "age"=> 32,
                "img"=>"\imagen\people-g4a49f8e82_640.jpg"
            ],
            [
                "name"=>"Nico",
                "lastname"=>"Gasparro",
                "age"=> 30,
                "img"=>"\imagen\bartender-g8d493266b_640.jpg"
            ],
            [
                "name"=>"Gemma",
                "lastname"=>"Zaragoza",
                "age"=> 23,
                "img"=>"\imagen\bar-gefc46462f_640.jpg"
            ],
            [
                "name"=>"Gracia",
                "lastname"=>"Ruiz",
                "age"=> 35,
                "img"=>"\imagen\woman-g395338ed5_640.jpg"
            ]

        ];
        $title = "Hola a todos";
        /* ['persons'=>$persons] */ 
        return view('aboutUs',compact("persons", "title"));
    }
}
