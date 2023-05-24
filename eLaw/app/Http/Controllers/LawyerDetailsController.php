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

   
    

}
