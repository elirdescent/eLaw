<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'description'=>'required'
        ]);

        $report = new Report();
        $report->description = $request->description;
        $res = $report->save();
        if($res)
        {
            return back()->with('success','Report posted successfully!');
        }
        else
        {
            return back()->with('fail','Report could not be posted!');
        }

    }

    
}
