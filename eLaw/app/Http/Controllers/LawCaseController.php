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

    public function addCase(Request $request)
    {
        $request->validate([
            
            'title'=>'required',
            'name'=>'required',
            'surname'=>'required',
            'case_summary'=>'required',
            'case_description'=>'required',
            'case_progress'=>'required',
           
        ],
        );

            $case = new LawCase();
            $case->lawyer_id = session('loginId');
            $case->title = $request->title;
            $case->name = $request->name;
            $case->surname = $request->surname;
            $case->case_summary = $request->case_summary;
            $case->case_description = $request->case_description;
            $case->case_progress = $request->case_progress;
            $res = $case->save();
            if($res)
            {
                return redirect('dash');

            }
            else{

                return redirect('home');

            }
    }

    public function logout()
    {
        if(Session::has('loginId'))
        {
            Session::pull('loginId');
            return redirect('lawyerprofile');
        }

    }

    public function delete($id)
    {
        $case = LawCase::find($id);
        $case->delete();
        return redirect('/dash')->with('success',"Case removed successfully!");

    }
}
