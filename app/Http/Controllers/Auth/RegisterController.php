<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/welcome';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'org_name' => 'required_if: org_type, Wildlife group|max:255|nullable',
            'license_id' => 'required',
            'description' => 'max:250',
            'website' => 'nullable|url',
            'telephone' => 'required_without:mobile',
            'mobile' => 'required_without:telephone',
            'email' => 'required|email|max:255|unique:users',
            'address' => 'required',
            'suburb' => 'required',
            'postcode' => 'required',
            'state' => 'required',
            'password' => 'required|min:6|confirmed',
            
        ]);
    }

   

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        //$user =  auth()->user();
        $userAddress = $data['address'].", ".$data['suburb'].", ".$data['state'].", ".$data['postcode'];
        $coordinates = $this->getCoordinates($userAddress);

        //dd(is_float($coordinates[0]));

        return User::create([
            'org_type' => $data['org_type'],
            'org_name' => $data['org_name'],
            'license_id' => $data['license_id'],
            'description' => $data['description'],
            'website' => $data['website'],
            'contact_person' => $data['contact_person'],
            'email' => $data['email'],
            'telephone' => $data['telephone'],
            'mobile' => $data['mobile'],
            'address' => $data['address'],
            'suburb' => $data['suburb'],
            'postcode' => $data['postcode'],
            'state' => $data['state'],
            'latitude' => $coordinates[0],
            'longitude' => $coordinates[1],
            'password' => bcrypt($data['password']),
            'accept_terms' => $data['accept_terms'],
        ]);
    }

     /* Get shelter/wildlife group latitude and longitude values */
    public function getCoordinates($address){
        $address = urlencode($address);
        $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=" . $address;
        $response = file_get_contents($url);
        $json = json_decode($response,true);
     
        $lat = $json['results'][0]['geometry']['location']['lat'];
        $lng = $json['results'][0]['geometry']['location']['lng'];
     
        return array($lat, $lng);
    }
}
