<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Home;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('contact');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function home()
    {
        return view('home');
    }
    public function contact()
    {
        //dd(Auth::check());
        //dd(Auth::id());

        return view('contact');
    }

    public function secret(Request $request){

         $validates = $request->validate([

            'player' => 'required|min:4|max:20'

         ]);

         $home = new Home();
         $home->player = $request->input('player');
         $home->save();



    }

    public function players(){

        $home = Home::all();

        return view('pla', ['home' => $home]);
  }


}
