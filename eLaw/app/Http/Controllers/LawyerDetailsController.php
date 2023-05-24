<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\LawyerDetails;

class LawyerDetailsController extends Controller
{
    public function show()
    {
        
           
            if(Session::has('loginId'))
            {
                $data = LawyerDetails::where('lawyer_id','=',session('loginId'))->first();
                if($data)
                {
                    return view('userprofile',compact('data'));
                }
                else
                {
                    return back()->with('fail','Your profile does not exist yet!');
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
            'country'=>'required|regex:/^[a-zA-Z]+$/',
            'job'=>'required',
            'pricing'=>'required',
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

    $details = new LawyerDetails();
    $details->lawyer_id = session('loginId');
    $details->name = $request->name;
    $details->surname = $request->surname;
    $details->username = $request->username;
    $details->city = $request->city;
    $details->country = $request->country;
    $details->address = $request->address;
    $details->job = $request->job;
    $details->pricing = $request->pricing;
    $details->bio = $request->bio;
    $res = $details->save();
    if($res)
    {

         

        return back()->with('success','Profile created successfully!');
    }
    else
    {
        return back()->with('error','Profile already exists or could not be created!');
    }

    
    }


    public function update(Request $request)
    {
        $details = LawyerDetails::where('lawyer_id','=',session('loginId'))->first();
        $details->name = $request->input('name');
        $details->surname = $request->input('surname');
        $details->username = $request->input('username');
        $details->city = $request->input('city');
        $details->country = $request->input('country');
        $details->address = $request->input('address');
        $details->job = $request->input('job');
        $details->pricing = $request->input('pricing');
        $details->bio = $request->input('bio');
       $res =  $details->update();
       if($res)
       {
        return back()->with('success','Profile updated successfully!');

       }
       else
       {
        return back()->with('fail','Case could not be updated!');
       }
        

    }
    

}
