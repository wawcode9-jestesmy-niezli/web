<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Place;
use App\User;

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
        $visited = \DB::table('userplaces')
            ->where(['userplaces.idUser' => \Auth::user()->id])
            ->pluck('userplaces.idPlace');

        return view('places')->with(['places' => Place::all(), 'visited' => $visited]);
    }

    private function getBlock($id, $originKey) {
        return (object)[
            'image' => '/puzzle/' . $id . '/' . $originKey . '.jpg',
            'activePosition' => 0,
            'originalPosition' => $originKey
        ];
    }

    public function api(Request $request) {
        $blocks = [];

        for ($i = 0; $i < 50; $i++) {
            $blocks[] = $this->getBlock($request->id, $i);
        }

        shuffle($blocks);

        foreach($blocks as $key => &$block) {
            $block->activePosition = $key;
        }

        $place = Place::find($request->id);
        $name = '';
        if (!empty($place)) {
            $name = $place->name;
        }

        return response([
            'id' => $request->id,
            'name' => $name ,
            'blocks' => $blocks
        ]);
    }

    public function wranking(Request $request) {
        $user = User::pluck('name');
        return view('wranking')->with(['items' => $user]);
    }

    public function pranking(Request $request) {
        $user = Place::pluck('name');
        return view('pranking')->with(['items' => $user]);
    }

    public function show(Request $request) {
        $place = Place::find($request->id);
        if (!$place) {
            return redirect('/');
        }
        $relationExists = \DB::table('userplaces')->where(['idUser' => \Auth::user()->id, 'idPlace' => $request->id])->exists();
        if (!$relationExists) {
            return redirect('/');
        }
        return view('place')->with(['place' => $place]);
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
                    ['idUser' => $userId, 'idPlace' => $place->id, 'createDate' => Carbon::now()]
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
