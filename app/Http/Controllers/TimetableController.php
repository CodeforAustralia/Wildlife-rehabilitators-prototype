<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Timetable;
use App\Models\Holidays;
use App\Models\Species;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class TimetableController extends Controller
{
	

    public static $days=['monday','tuesday','wednesday','thursday','friday','saturday','sunday'];
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('timetable');
    }

    public function store(Request $request)
    {
        
        $save=false;
        $data = $request->except('_token');
        
        $user = auth()->user(); //logged in user
        $empty_times = false;

        Validator::make($request->all(), [
            'monday_to' => 'after:monday_from',
            'tuesday_to' => 'after:tuesday_from',
            'wednesday_to' => 'after:wednesday_from',
            'thursday_to' => 'after:thursday_from',
            'friday_to' => 'after:friday_from',
            'saturday_to' => 'after:saturday_from',
            'sunday_to' => 'after:sunday_from', 
            'startdate' => 'nullable|after:today',
            'finishdate' => 'nullable|after:startdate'
        ])->validate();

        
        $user_timetable = Timetable::select('day_of_week', 'starttime', 'finishtime')->where('license_id', '=', $user->license_id)->get();
        foreach (TimetableController::$days as $day) {
            if(array_key_exists($day, $data)){
                $save=true;
                if($data[$day.'_from'] !== null && $data[$day.'_to'] !== null ) {
                    //what if start time == finishtime
                    // finishtime should be after starttime

                    $timetable = Timetable::updateOrCreate(
                        [
                            'license_id' => $user->license_id, 
                            'day_of_week' => $day,
                        ],
                        [
                            'starttime' => $data[$day.'_from'], 
                            'finishtime' => $data[$day.'_to'],
                        ]);
                }else {
                    $empty_times = true;
                }

                
                                  
            }
        }
        
        if (array_key_exists("public_holidays", $data)) {
            $save=true;
            //$empty_times = true;
            $user->work_on_holidays = true;
            $user->save();
        }

        if (array_key_exists("closure_periods", $data)){
            $save=true;
            //$empty_times = true;
            // finishtime should be after starttime
            $holidays = Holidays::updateOrCreate(
                [  'license_id' => $user->license_id  ],
                [
                   'startdate' => $data['startdate'],
                   'finishdate' => $data['finishdate'],
                ]);    
        }
       
        if(!$save){
            return Redirect::to('/timetable')
                    ->withInput()
                    ->withErrors(array('message' => 'At least one day must be specified.'));
        }
        if($empty_times) {
            return Redirect::to('/timetable')
                    ->withInput()
                    ->withErrors(array('message' => 'Times must be specified.'));
        }

        return redirect()->route('species_exp');
        
       
    }
}
