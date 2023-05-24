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
    public function addTask(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'name'=>'required',
            'surname'=>'required',
            'task_description'=>'required',
            'case_progress'=>'required'
        ]
            
        );

        $task = new Task();
        $task->lawyer_id = session('loginId');
        $task->title = $request->title;
        $task->name = $request->name;
        $task->surname = $request->surname;
        $task->task_description = $request->task_description;
        $task->case_progress = $request->case_progress;
        $res = $task->save();
        if($res)
        {
            return back()->with('success','Task added successfully!');
        }
        else
        {
            return back()->with('fail','Case could not be added!');
        }
        }
  
   
}
