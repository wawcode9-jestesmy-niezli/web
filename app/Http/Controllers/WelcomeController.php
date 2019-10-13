<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;

class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $places = Place::limit(5)->get();
        return view('welcome')->with(['places' => $places]);
    }
}
