<?php

namespace App\Http\Controllers;

use App\Models\Brewery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BreweryRequest;

class BreweryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breweries = Brewery::all();
        return view('breweries.index',compact('breweries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('breweries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BreweryRequest $request)
    {
        // verificar si está autentificado
        if(!$user = Auth::user()){
            return redirect()->route('register')->withMessage('You are not logged in, plese do it');
        }
        
        // guardar la brewery en el db asociandola a user
        $user->breweries()->create($request->all());
        // Brewery::create($request->all());

        return redirect()->route('breweries.index')->withMessage('Brewery successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brewery  $brewery
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brewery = Brewery::findOrFail($id);

        return view('breweries.show',compact('brewery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brewery  $brewery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         // verificar si estás autentificado
        if(!$user = Auth::user()){
            return redirect()->route('register')->withMessage('You are not logged in, plese do it');
        }
        // recupero la brewery que quiero modificar
        $brewery = Brewery::findOrFail($id);

         // veriifcar si eres el creador de la brewery
        if($user->id != $brewery->user_id){
            return back()->withMessage("You are not the creator!");
        }
        

        return view('breweries.edit',compact('brewery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brewery  $brewery
     * @return \Illuminate\Http\Response
     */
    public function update(BreweryRequest $request, $id)
    {
         // verificar si estás autentificado
        if(!$user = Auth::user()){
            return redirect()->route('register')->withMessage('You are not logged in, plese do it');
        }
        // recupero la brewery que quiero modificar
        $brewery = Brewery::findOrFail($id);

         // veriifcar si eres el creador de la brewery
        if($user->id != $brewery->user_id){
            return back()->withMessage("You are not the creator!");
        }

        $brewery->update($request->all());
    
        return redirect()->route('breweries.show',$id)->withMessage('Brewery modified successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brewery  $brewery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // verificar si estás autentificado
        if(!$user = Auth::user()){
            return redirect()->route('register')->withMessage('You are not logged in, plese do it');
        }
        // recupero la brewery que quiero modificar
        $brewery = Brewery::findOrFail($id);

         // veriifcar si eres el creador de la brewery
        if($user->id != $brewery->user_id){
            return back()->withMessage("You are not the creator!");
        }
        

        $brewery->delete();

        return redirect()->route('breweries.index')->withMessage('Brewery deleted successfully');
    }
}
