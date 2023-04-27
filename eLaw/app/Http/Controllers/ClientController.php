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

   
   

    
}