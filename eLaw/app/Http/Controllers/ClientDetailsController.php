<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ClientDetails;
use Session;
class ClientDetailsController extends Controller
{
    public function show()
    {
        if(Session::has('loginId'))
        {
            $data = ClientDetails::where('client_id','=',session('loginId'))->first();
            if($data)
            {
                return view('clientprofile',compact('data'));
            }
            else
            {
                return back()->with('fail','Your profile does not exist!');
            }

        }
    }

    public function createProfile(Request $request)
    {
        $request->validate([
            'name'=>'required|regex:/^[a-zA-Z]+$/',
            'surname'=>'required|regex:/^[a-zA-Z]+$/',
            'username'=>'required|regex:/^[a-zA-Z]+$/',
            'city'=>'required|regex:/^[a-zA-Z]+$/',
            'address'=>'required',
            'country'=>'required',
            'job'=>'required',
            'bio'=>'required'

        ],
    [
            'name.regex' => 'The :attribute field may only contain letters.',
            'name.not_regex' => 'The :attribute field may not contain numbers.', 
            'surname.regex' => 'The :attribute field may only contain letters.', 
            'surname.not_regex' => 'The :attribute field may not contain numbers.', 
            'username.regex' => 'The :attribute field may only contain letters.', 
            'username.not_regex' => 'The :attribute field may not contain numbers.',
            'city.regex' => 'The :attribute field may only contain letters.', 
            'city.not_regex' => 'The :attribute field may not contain numbers.', 
            'country.regex' => 'The :attribute field may only contain letters.', 
            'country.not_regex' => 'The :attribute field may not contain numbers.', 
    ]);

    $details = new ClientDetails();
    $details->client_id = session('loginId');
    $details->name = $request->name;
    $details->surname = $request->surname;
    $details->username = $request->username;
    $details->city = $request->city;
    $details->address = $request->country;
    $details->country = $request->address;
    $details->job = $request->job;
    $details->bio = $request->bio;
    $res = $details->save();

    $data = ClientDetails::where('client_id','=',session('loginId'))->first();

    if($res)
    {
        return back()->with('success','Profile created successfully!');
    }
    else if($data)
    {
        return back()->with('exists','Profile already exists!');
    }
    else
    {
        return back()->with('fail','Profile could not be created!');
    }

    }


   
    
}
