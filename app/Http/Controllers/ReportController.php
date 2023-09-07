<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();
        return view('report', ["reports" => $reports]);
    }

    public function getByID($id)
    {
        // dd(session()->get('_previous')['url']);
        // TODO: add pagination
        $data = Report::where('id', $id)
            ->first();
        return view('report-detail', [
            "report" => $data,
        ]);
    }

    public function add(Request $request)
    {
        // TODO: sanitize input

        $reportDTO = new Report([
            "title" => "report by " . $request->user()->name,
            "author_id" => $request->user()->id,
            "content" => $request->input("report")
        ]);

        $ok = $reportDTO->save();
        $msg = "submitting report successfull";
        if (!$ok) {
            $msg = "you fucked up";
        }
        return back()->withInput(["message" => $msg]);
    }

    public function update(Request $request)
    {
        ddd($request);
    }

    public function delete($id)
    {
        Report::destroy($id);
        return redirect('/');
    }
}
