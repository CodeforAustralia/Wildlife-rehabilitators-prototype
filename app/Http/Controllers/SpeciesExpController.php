<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Species;
use App\Models\SpeciesUsers;
use Illuminate\Support\Facades\DB;

class SpeciesExpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $user = auth()->user();
        $species = Species::all();
        $user_species = SpeciesUsers::where('license_id', '=', $user->license_id)->get();
        
        return view('species_exp')->with('species', $species)->with('user_species', $user_species);
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $user = auth()->user(); //logged in user
        $current_species = SpeciesUsers::where('license_id', '=', $user->license_id)->get();
       
        foreach ($data as $key => $value) {
            $has_it = $current_species->contains('species_id', $key);
            if (!$has_it) {
                             
               SpeciesUsers::create([
                'license_id' => $user->license_id,
                'species_id' => $key
                ]);
             }                      
        }
    

        return redirect()->route('converage_area');        
    }
}
