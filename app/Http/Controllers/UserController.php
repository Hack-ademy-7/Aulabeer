<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showAuth()
    {
        if(!$user = Auth::user()){
            return back()->withMessage('Not authenticated');
        }

        return view('users.show',compact('user'));

    }

    public function show($id){
        $user = User::findOrFail($id);

        return view('users.show',compact('user'));
    }
    
}
