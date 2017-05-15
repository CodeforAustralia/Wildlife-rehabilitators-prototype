<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile/index');
    }

    public function show()
    {
        $user = User::find(auth()->user()->id);
        return view('profile/show')->with('user', $user);
    }

    public function update(Request $request)
    {
    	$data = $request->except('_token');
        $user = User::find(auth()->user()->id);

    	$this->validate($request, [
            'org_name' => 'required|max:255',
            'license_id' => 'required',
            'description' => 'max:250',
            'website' => 'nullable|url',
            'telephone' => 'required_without:mobile',
            'mobile' => 'required_without:telephone',
            'email' => ['required', Rule::unique('users')->ignore($user->id),],
            'address' => 'required',
            'suburb' => 'required',
            'postcode' => 'required',
            'state' => 'required',
            
        ]); 

    	$user->org_name = $data['org_name'];
        $user->license_id = $data['license_id'];
        $user->description = $data['description'];
        $user->website = $data['website'];
        $user->contact_person = $data['contact_person'];
        $user->email = $data['email'];
        $user->telephone = $data['telephone'];
        $user->mobile = $data['mobile'];
        $user->address = $data['address'];
        $user->suburb = $data['suburb'];
        $user->postcode = $data['postcode'];
        $user->state = $data['state'];

             	
        $user->save();
    	
        return view('profile/index');
    }
}
