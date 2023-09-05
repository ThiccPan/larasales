<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = [
            "report 1",
            "report 2",
        ];

        return view('report', ["reports" => $reports]);
    }

    public function addReport(Request $request)
    {
        $reportDTO = new Report([
            "title" => "report by " . $request->user()->name,
            "author" => $request->user()->id,
            "content" => "testing purpose"
        ]);

        dd($reportDTO);
    }
}
