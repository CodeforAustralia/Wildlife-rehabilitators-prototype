<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;

class CoverageAreaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    { 
        $user =  auth()->user();
        $userAddress = $user->address.", ".$user->suburb.", ".$user->state.", ".$user->postcode;
       
        Mapper::location($userAddress)->map(['zoom' => 9, 'center' => true, 'marker' => ['title' => 'My Location', 'animation' => 'DROP'], 'type' => 'ROADMAP', 'eventAfterLoad' => 'circleListener(maps[0].shapes[0].circle_0);']);

       
        if($user->coverage_area == NULL) {
            $km_radius = 10;
        } else {
            $km_radius = $user->coverage_area;
        }
        //dd($km_radius);

        Mapper::circle([['latitude' => $user->latitude, 'longitude' => $user->longitude]], ['strokeColor' => '#000000', 'strokeOpacity' => 0.1, 'strokeWeight' => 2, 'fillColor' => '#FFFFFF', 'radius' => $km_radius*1000, 'editable' => 'true', 'draggable' => 'false' ]);

        return view('coverage_area')->with('km_radius', $km_radius);
    }

    public function update(Request $request)
    {
        
        $data = $request->except('_token');

        //dd($data);
        $user = auth()->user();
        if($data['coverage_area'] != NULL && $user->coverage_area != NULL) {
            $user->coverage_area = $data['coverage_area'];
            $user->save();
        }

        return redirect('home');
    }
}
