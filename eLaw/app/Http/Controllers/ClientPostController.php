<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientPost;
use Session;

class ClientPostController extends Controller
{

    public function show()
    {
        $data = ClientPost::all()->where('client_id','=',session('loginId'));
        return view('clientposts',['clientpost'=>$data]);
    }

    public function showAll()
    {
        $data = ClientPost::all();
        return view('viewclientposts',['clientpost'=>$data]);
        
    }

    public function addPost(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required'

        ]);

        $post = new ClientPost();
        $post->client_id = session('loginId');
        $post->username = session('username');
        $post->title = $request->title;
        $post->description = $request->description;
        $post->category = $request->category;
        $res = $post->save();
        if($res)
        {
            return back()->with('success','Post created successfully!');
        }
        else
        {
            return back()->with('fail','Post could not be created!');
        }

    }

    public function delete($id)
    {
        $post = ClientPost::find($id);
       $res = $post->delete();
        if($res)
        {
            return back()->with('success','Post deleted successfully!');

        }
        else
        {
            return back()->with('fail','Post could not be deleted!');
        }
       
    }

    public function sortByCategory()
    {
        $search_text = $_GET['category'];
        $data = ClientPost::where('category','=',$search_text)->get();
        return view('viewclientposts',['clientpost'=>$data]);

    }
    
}
