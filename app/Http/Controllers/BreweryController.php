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
        $brewery = Brewery::findOrFail($id);

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
        // recupero la brewery que quiero modificar
        $brewery = Brewery::findOrFail($id);

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
        $brewery = Brewery::findOrFail($id);

        $brewery->delete();

        return redirect()->route('breweries.index')->withMessage('Brewery deleted successfully');
    }
}
