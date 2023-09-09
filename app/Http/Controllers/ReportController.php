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
        // TODO: add pagination
        $data = Report::where('id', $id)
            ->first();
        return view('report-detail', [
            "report" => $data,
        ]);
    }

    public function add(Request $request)
    {
        $cleanRequest = $request->validate([
            "title" => ['string'],
            "report" => ['string', 'required'],
        ]);
        $cleanRequest["author_id"] = $request->user()->id;

        $reportDTO = new Report([
            "title" => "report by " . $cleanRequest["title"],
            "author_id" => $cleanRequest["author_id"],
            "content" => $cleanRequest["report"],
        ]);

        $ok = $reportDTO->save();
        $msg = "submitting report successfull";
        if (!$ok) {
            $msg = "you fucked up";
        }
        return back()->withInput(["message" => $msg]);
    }

    public function update(Request $request, $id)
    {
        // ddd($request);
        $oldReport = Report::find($id);
        $oldReport->title = $request->title;
        $oldReport->content = $request->content;
        $oldReport->save();
        return back();
    }

    public function delete($id)
    {
        Report::destroy($id);
        return redirect('/');
    }
}
