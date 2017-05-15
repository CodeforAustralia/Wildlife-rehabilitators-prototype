<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use App\Models\User;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $timetable = DB::table('timetable')->where('license_id', '=', $user->license_id)->get();
        $holidays = DB::table('holidays')->where('license_id', '=', $user->license_id)->get();
        
        $species = DB::table('species_users')->join('species', function ($join) {
            $join->on('species_users.species_id', '=', 'species.species_id')
                 ->where('license_id', '=', auth()->user()->license_id);
        })->get();

        if($user->coverage_area != NULL) {
            Mapper::map($user->latitude, $user->longitude)->circle([['latitude' => $user->latitude, 'longitude' => $user->longitude]], ['strokeColor' => '#000000', 'strokeOpacity' => 0.1, 'strokeWeight' => 2, 'fillColor' => '#FFFFFF', 'radius' => $user->coverage_area*1000, 'editable' => 'true', 'draggable' => 'false' ]);
        }

        $other_centres = User::all()->where('accept_terms', '=', 1);
        

        
        //verificacion de variables antes de pasarlas
        if($species->isEmpty() && $holidays->isEmpty()) {
            return view('home')->with('timetable', $timetable)->with('other_centres', $other_centres);
        } else if (!$species->isEmpty() && !$holidays->isEmpty()) {
            return view('home')->with('timetable', $timetable)->with('other_centres', $other_centres)->with('species', $species)->with('holidays', $holidays);
        } else if (!$species->isEmpty() && $holidays->isEmpty()) {
                return view('home')->with('timetable', $timetable)->with('other_centres', $other_centres)->with('species', $species);
        } else if ($species->isEmpty() && !$holidays->isEmpty()){
                return view('home')->with('timetable', $timetable)->with('other_centres', $other_centres)->with('holidays', $holidays);
            
        }

        
    }
}
