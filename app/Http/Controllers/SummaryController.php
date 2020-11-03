<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Summary;
use Excel;
use App\Exports\SummaryExport;

class SummaryController extends Controller
{
    public function index()
    {
        return view('summary.index', ["page_title" => "Summary"]);
    }

    public function listSummary(Request $request)
    {
        if (isset($request->start_date) && isset($request->end_date))
        {
            $from = date($request->start_date);
            $to = date($request->end_date);

            $list_sum = Summary::whereRaw(
                "(created_at >= ? AND created_at <= ?)", 
                [$from." 00:00:00", $to." 23:59:59"]
            )->get();
        }
        else
        {
            $list_sum = Summary::orderBy('id', 'DESC')->get();
        }

        $callback = array(
            'data'=>$list_sum
        );

        return response()->json($callback, 201);
    }

    public function export_excel(Request $request)
    {
        if (isset($request->start_date) && isset($request->end_date))
        {
            //echo "test"; die();
            return new SummaryExport($request->start_date, $request->end_date);
        }
        else
        {
            //echo "keren"; die();
            return new SummaryExport();
        }
        
    }
}
