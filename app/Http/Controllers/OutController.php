<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Out;
use Excel;
use App\Exports\OutExport;

class OutController extends Controller
{
    public function index()
    {
        return view('out.index', ["page_title" => "Out"]);
    }

    public function listOut(Request $request)
    {
        if (isset($request->start_date) && isset($request->end_date))
        {
            $from = date($request->start_date);
            $to = date($request->end_date);

            $list_out = Out::whereBetween('tanggal', [$from, $to])->get();
        }
        else
        {
            $list_out = Out::orderBy('id', 'DESC')->get();
        }
        

        $callback = array(
            'data'=>$list_out
        );

        return response()->json($callback, 201);
    }

    public function export_excel(Request $request)
    {
        if (isset($request->start_date) && isset($request->end_date))
        {
            //echo "test"; die();
            return new OutExport($request->start_date, $request->end_date);
        }
        else
        {
            //echo "keren"; die();
            return new OutExport();
        }
    }
}
