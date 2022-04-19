<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // if user is admin
        if ( Auth::user()->user_role == 2 ) 
        {
            $users = User::all();
            return view('dashboard', ["users" => $users]);
        } 
        else 
        {
            return view('home');
        }
        
    }
}
