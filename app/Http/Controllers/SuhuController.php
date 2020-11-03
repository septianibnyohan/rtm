<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suhu;
use App\Exports\SuhuExport;
use Excel;

class SuhuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('suhu.index', ["page_title" => "Suhu"]);
    }

    public function listSuhu(Request $request)
    {
        if (isset($request->start_date) && isset($request->end_date))
        {
            $from = date($request->start_date);
            $to = date($request->end_date);

            $list_suhu = Suhu::whereBetween('tanggal', [$from, $to])->get();
        }
        else
        {
            $list_suhu = Suhu::orderBy('id', 'DESC')->get();
        }
        

        $callback = array(
            'data'=>$list_suhu
        );

        return response()->json($callback, 201);
    }

    public function export_excel(Request $request)
    {
        if (isset($request->start_date) && isset($request->end_date))
        {
            //echo "test"; die();
            return new SuhuExport($request->start_date, $request->end_date);
        }
        else
        {
            //echo "keren"; die();
            return new SuhuExport();
        }
    }
}
