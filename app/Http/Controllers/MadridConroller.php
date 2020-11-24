<?php

namespace App\Http\Controllers;
use App\Madrid;
use Illuminate\Http\Request;

class MadridConroller extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth')->except('madrid');
    // }



    public function secretmadrid(Request $request){

        $validates = $request->validate([

           'player_two' => 'required|min:4|max:20'

        ]);

        $madrid = new Madrid();
        $madrid->player_two = $request->input('player_two');
        $madrid->save();



    }

    public function real(){

        $madrid = Madrid::all();
        return view('realm', ['madrid' => $madrid]);
    }


}
