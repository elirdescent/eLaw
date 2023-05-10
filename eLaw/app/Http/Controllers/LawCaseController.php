<?php

namespace App\Http\Controllers;

use App\Models\LawCase;
use Illuminate\Http\Request;
use Session;

class LawCaseController extends Controller
{

    public function show()
    {
        if(Session::has('loginId'))
        {
            $data=LawCase::all() ->where('lawyer_id', '=', session('loginId'));
            return view('dash',['lawcase'=>$data]);

        }
       
    }

    
}
