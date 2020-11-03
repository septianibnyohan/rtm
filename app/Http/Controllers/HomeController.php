<?php

namespace App\Http\Controllers;
use App\Models\Setting;

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
        $settings = Setting::get();

        $client_logo = "";
        foreach($settings as $setting)
        {
            if ($setting->code == "room_capacity")
            {
                $room_capacity = $setting->value;
            }

            if ($setting->code == "client_name")
            {
                $client_name = $setting->value;
            }

            if ($setting->code == "client_logo")
            {
                $client_logo = $setting->value;
            }
        }

        return view('home', ["page_title" => "Dashboard", 'room_capacity' => $room_capacity,
            'client_name' => $client_name, 'client_logo' => $client_logo]);
    }
}
