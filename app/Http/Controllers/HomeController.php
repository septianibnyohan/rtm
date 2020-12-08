<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
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
        $result = User::orderBy('first_name', 'ASC')->get();

        foreach($result as $row) {
            $user_list[] = $row->first_name . ' ' . $row->last_name;
        }

        return view('home', ["page_title"=> "LEAVE", "user_list" => $user_list]);
    }
}
