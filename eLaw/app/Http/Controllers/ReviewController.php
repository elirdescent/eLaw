<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Client;

class ReviewController extends Controller
{
    public function show()
    {

        
        $data = User::all();
        $reviews = Review::all();
        

        return view('review',['lawyerdata'=>$data],['reviewdata'=>$reviews]);


    }

    
}
