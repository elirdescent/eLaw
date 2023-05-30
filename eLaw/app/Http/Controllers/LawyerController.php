<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserInfo;

use Hash;
use Session;

class LawyerController extends Controller
{
    public function Login()
    {
        return view("loginlawyer") ;

    }

    public function registration()
    {
        return view("registerlawyer");

    }

    public function registerLawyer(Request $request)
    {
        $request->validate([
            'name'=>'required|regex:/^[a-zA-Z]+$/',
            'surname'=>'required|regex:/^[a-zA-Z]+$/',
            'email'=>'required|email|unique:users',
            'username'=>'required|unique:users|regex:/^[a-zA-Z0-9]+$/',
            'birthdate'=>'required',
            'address'=>'required',
            'password'=>'required|min:6'
        ],
        [   'name.regex' => 'The :attribute field may only contain letters.',
            'name.not_regex' => 'The :attribute field may not contain numbers.', 
            'surname.regex' => 'The :attribute field may only contain letters.', 
            'surname.not_regex' => 'The :attribute field may not contain numbers.', 
            'username.regex' => 'The :attribute field may only contain letters and numbers.', 
            'username.not_regex' => 'The :attribute field may not contain special characters.']);

            $user = new User();
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->birthdate = $request->birthdate;
            $user->address = $request->address;
            $user->password = Hash::make($request->password);
            $res = $user->save();
            if($res)
            {
                return back()->with('success','You have registered successfully!');

            }
            else{

                return back()->with('fail','Oops! Something went wrong.');

            }

            
    
    }

    public function loginLawyer(Request $request)
    {
        $request->validate([
            'username'=>'required|regex:/^[a-zA-Z0-9]+$/',
            'password'=>'required|min:6'
           ],
        [
                'username.regex' => 'The :attribute field may only contain letters and numbers.', 
                'username.not_regex' => 'The :attribute field may not contain special characters.'
        ]);

        $user = User::where('username','=',$request->username)->first();

        if($user)
        {
            if(Hash::check($request->password,$user->password))
            {
                $request->session()->put('loginId',$user->id);
                $request->session()->put('userType','lawyer');
                return redirect('lawyerprofile');

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

    public function lawyerProfile()
    {
        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id','=', Session::get('loginId'))->first();
        }
        return redirect('dash');
    }

    public function logout()
    {
        if(Session::has('loginId'))
        {
            Session::pull('loginId');
            return redirect('lawyerprofile');
        }

    }

    public function getAll()
    {
        $data = User::all();
        return view('adminlawyer',['lawyer'=>$data]);
    }

    public function delete($id)
    {
        $lawyer = User::where('id','=',$id);
        $res=$lawyer->delete();
        if($res)
        {
            return back()->with('success','Lawyer deleted successfully!');
        }
        else
        {
            return back()->with('fail','Lawyer could not be deleted!');
        }

    }


   

  

    
  
}
