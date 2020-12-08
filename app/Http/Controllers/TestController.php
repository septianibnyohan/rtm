<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Suhu;

use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $list_suhu = Suhu::where('ldr', '<', 37)->get();

        return view('test.index', ["list_suhu" => $list_suhu]);
    }

    public function getsuhu(Request $request)
    {

        $type = $request->type;

        if ($type == "1")
        {
            $list_suhu = Suhu::where('ldr', '<', 37)->get();
        }

        if ($type == "2")
        {
            $list_suhu = Suhu::where('ldr', '>=', 37)->get();
        }

        return response()->json($list_suhu, 201);
    }
}
