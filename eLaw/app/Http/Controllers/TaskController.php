<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Session;


class TaskController extends Controller
{  
    public function show()
    {
        
        
            $data=Task::all() ->where('lawyer_id', '=', session('loginId'));
            return view('tasks',['lawyertask'=>$data]);

        
       
    }
   
}
