<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\In;
use Excel;
use App\Exports\InExport;
class InController extends Controller
{
    public function index()
    {
        return view('in.index', ["page_title" => "In"]);
    }

    public function listIn(Request $request)
    {
        if (isset($request->start_date) && isset($request->end_date))
        {
            $from = date($request->start_date);
            $to = date($request->end_date);

            $list_in = In::whereBetween('tanggal', [$from, $to])->get();
        }
        else
        {
            $list_in = In::orderBy('id', 'DESC')->get();
        }

        $callback = array(
            'data'=>$list_in
        );

        return response()->json($callback, 201);
    }

    public function export_excel(Request $request)
    {
        if (isset($request->start_date) && isset($request->end_date))
        {
            //echo "test"; die();
            return new InExport($request->start_date, $request->end_date);
        }
        else
        {
            //echo "keren"; die();
            return new InExport();
        }
    }
}
