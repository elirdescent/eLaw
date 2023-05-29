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

   
    
}
