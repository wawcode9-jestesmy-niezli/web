<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;

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
        $places = \DB::table('places')
            ->join('userplaces', 'places.id', '=', 'userplaces.idPlace')
            ->select('places.*')
            ->where(['userplaces.idUser' => \Auth::user()->id])
            ->get();

        return view('home')->with(['places' => $places]);
    }
}
