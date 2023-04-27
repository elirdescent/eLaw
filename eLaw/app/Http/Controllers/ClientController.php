<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Hash;
use Session;

class ClientController extends Controller
{
    public function Login()
    {
        return view("loginclient") ;

    }

    public function registration()
    {
        return view("registerclient");

    }
    public function registerClient(Request $request)
    {
       $request->validate([
        'name'=>'required|regex:/^[a-zA-Z]+$/',
        'surname'=>'required|regex:/^[a-zA-Z]+$/',
        'email'=>'required|email|unique:clients',
        'username'=>'required|regex:/^[a-zA-Z0-9]+$/|unique:clients',
        'birthdate'=>'required',
        'password'=>'required|min:6'
       ],
    [
        'name.regex' => 'The :attribute field may only contain letters.',
            'name.not_regex' => 'The :attribute field may not contain numbers.', 
            'surname.regex' => 'The :attribute field may only contain letters.', 
            'surname.not_regex' => 'The :attribute field may not contain numbers.', 
            'username.regex' => 'The :attribute field may only contain letters and numbers.', 
            'username.not_regex' => 'The :attribute field may not contain special characters.'
    ]);
    $client = new Client();
    $client->name = $request->name;
    $client->surname = $request->username;
    $client->email = $request->email;
    $client->username = $request->username;
    $client->birthdate = $request->birthdate;
    $client->password = Hash::make($request->password);
    $res = $client->save();

    if($res)
    {
        return back()->with('success','You have registered sucessfully!');
    }
    else
    {
        return back()->with('fail','Oops! Something went wrong.');
    }

   
}

public function loginClient(Request $request)
    {
        $request->validate([
            'username'=>'required|regex:/^[a-zA-Z0-9]+$/',
            'password'=>'required|min:6'
           ],
        [
                'username.regex' => 'The :attribute field may only contain letters and numbers.', 
                'username.not_regex' => 'The :attribute field may not contain special characters.'
        ]);

        $client = Client::where('username','=',$request->username)->first();

        if($client)
        {
            if(Hash::check($request->password,$client->password))
            {
                $request->session()->put('loginId',$client->id);
                return redirect('userprofile');

            }
            else
            {
                return back()->with('fail','Password is incorrect!');
            }

        }
        else
        {
            return back()->with('fail','This username is not registered!');
        }

    }

    public function userProfile()
    {
        $data = array();
        if(Session::has('loginId'))
        {
            $data = Client::where('id','=', Session::get('loginId'))->first();
        }
        return view("userprofile",compact('data'));
    }

    public function logout()
    {
        if(Session::has('loginId'))
        {
            Session::pull('loginId');
            return redirect('home');
        }

    }

   

    
}