<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::get();

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

        return view('settings.index', ["page_title" => "Setting", 'room_capacity' => $room_capacity,
        'client_name' => $client_name, 'client_logo' => $client_logo]);
    }

    public function save(Request $request)
    {
        $client_name = $request->client_name;
        $room_capacity = $request->room_capacity;
        $logo_file = $request->file('logo_file');

        $setting = Setting::where(['code' => 'room_capacity'])->update(
        [
            'value' => $room_capacity
        ]);

        $setting = Setting::where(['code' => 'client_name'])->update(
            [
                'value' => $client_name
            ]);

        if ($request->hasFile('logo_file'))
        {
            $dir_to = public_path().'/images/';
            $logo_file->move($dir_to, $logo_file->getClientOriginalName());
            $setting = Setting::where(['code' => 'client_logo'])->update(
            [
                'value' => '/images/'.$logo_file->getClientOriginalName()
            ]);
        }
        return view('settings.index', ["page_title" => "Setting", 'room_capacity' => $room_capacity,
        'client_name' => $client_name]);
    }
}
