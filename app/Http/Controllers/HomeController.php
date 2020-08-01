<?php

namespace App\Http\Controllers;

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
        $user = Auth::user();
        //dd($user);

        //dd($user->hasRole('developer')); //will return true, if user has role

        //dd($user->can('edit-users'));
        //dd($user->givePermissionsTo('create-tasks','edit-users'));
        return view('home');
    }
}
