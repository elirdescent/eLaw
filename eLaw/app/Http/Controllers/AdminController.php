<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Session;

class AdminController extends Controller
{

    public function login()
    {
        return view('adminlogin');

    }

    public function loginAdmin(Request $request)
    {
        $request->validate([
            'username'=>'required|regex:/^[a-zA-Z0-9]+$/',
            'password'=>'required|min:6'
           ],
        [
                'username.regex' => 'The :attribute field may only contain letters and numbers.', 
                'username.not_regex' => 'The :attribute field may not contain special characters.'
        ]);

        $admin = Admin::where('username','=',$request->username)->first();

        if($admin)
        {
                $request->session()->put('loginId',$admin->id);
                $request->session()->put('userType','admin');

             return redirect('adminlawyer');
            
        }
        else
        {
            return redirect('home');
        }



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
