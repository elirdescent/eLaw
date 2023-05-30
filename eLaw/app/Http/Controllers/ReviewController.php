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

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|regex:/^[a-zA-Z]+$/',
            'description'=>'required',
            'lawyer_username'=>'required',
            'rating'=>'required'
        ],
        );
        $review = new Review();
        $review->client_id = session('loginId');
        $review->title = $request->title;
        $review->description = $request->description;
        $review->lawyer_username = $request->lawyer_username;
        $review->rating = $request->rating;
        $res = $review->save();
        if($res)
        {
            return back()->with('success','Review posted successfully!');
        }
        else
        {
            return back()->with('fail','Review could not be posted!');
        }
    }

    public function delete($id)
    {
        $review = Review::find($id);
        $res = $review->delete();
        if($res)
        {
            return back()->with('success','Review deleted successfully!');
        }
        else
        {
            return back()->with('fail','Review could not be deleted!');
        }
        
    }
}
