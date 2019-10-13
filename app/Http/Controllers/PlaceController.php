<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Place;

class PlaceController extends Controller
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
        return view('places')->with(['places' => Place::all()]);
    }

    public function check(Request $request)
    {
        $places = Place::select('id', 'latitude', 'longitude')->get();
        $userId = \Auth::user()->id;
        $limit = 300;
        $id = [];
        foreach($places as $place) {
            $exists = \DB::table('userplaces')->where(['idUser' => $userId, 'idPlace' => $place->id])->exists();
            $distance = $this->haversineGreatCircleDistance($request->latitude, $request->longitude, $place->latitude, $place->longitude);
            if (!$exists && $distance <= $limit) {
                $id[] = $place->id;
                \DB::table('userplaces')->insert(
                    ['idUser' => \Auth::user()->id, 'idPlace' => $place->id, 'createDate' => Carbon::now()]
                );
            }
        }
        return response()->json(['id' => !empty($id[0]) ? $id[0] : null, 'length' => count($id)]);
    }

    private function haversineGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo) {
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);
        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;
        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return $angle * 6371000;
    }
}
