<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CalendarController extends Controller
{
    public function load()
    {
        $result = CalEvent::orderBy('id', 'DESC')->get();

        foreach($result as $row) {
            $data[] = [
                'id'              => $row->id,
                'title'           => $row->title,
                'start'           => $row->start_event,
                'end'             => $row->end_event,
                'backgroundColor' => $row->color,
                'className'       => $row->classname
            ];
        }

        return response()->json($data, 201);
    }

    public function insert(Request $request)
    {
        //collect data
        $error      = null;
        $title      = $request->title;
        $description = $request->description;
        $start      = $request->startDate;
        $end        = $request->endDate;
        $color      = $request->color;
        $text_color = $request->text_color;
        $user = $request->user;
        $type = $request->type;

        //format date
        $start = date('Y-m-d H:i:s', strtotime($start));
        $end = date('Y-m-d H:i:s', strtotime($end));

        $data['success'] = true;
        $data['message'] = 'Success!';

        if ($type == 1)
        {
            //store
            $calevent = new CalEvent([
                'title'       => $user . " : " . $description,
                'start_event' => $start,
                'end_event'   => $end,
                'color'       => $color,
                'text_color'  => $text_color,
                'classname'   => "white-back",
                'event_type' => $type
            ]);
            $calevent->save();

            $data['message'] = 'Success, save type 2!';
        }
        else if ($type == 2)
        {
            //store
            $calevent = new CalEvent([
                'title'       => $title,
                'start_event' => $start,
                'end_event'   => $end,
                'color'       => $color,
                'text_color'  => $text_color,
                'classname'   => "red-back",
                'event_type' => $type
            ]);
            $calevent->save();
        }
        

        


        // //validation
        // if ($title == '') {
        //     $error['title'] = 'description is required';
        // }

        // if ($start == '') {
        //     $error['start'] = 'Start date is required';
        // }

        // if ($end == '') {
        //     $error['end'] = 'End date is required';
        // }

        // //if there are no errors, carry on
        // if (! isset($error)) {

            
            
        //     //$user = Auth::user();
            
            

            
        
        // } else {

        //     $data['success'] = false;
        //     $data['errors'] = $error;
        // }

        return response()->json($data, 201);
    }

    public function getevent(Request $request)
    {
        $row = CalEvent::where(['id' => $request->id])->first();

        if (Str::contains($row->title, ':'))
        {
            $desc = explode(':',$row->title);
            $title = trim($desc[1]);
        }
        else
        {
            $title = $row->title;
        }

        $data = [
            'id'        => $row->id,
            'user'      => isset($desc[0]) ? trim($desc[0]) : "",
            'title'     => $title,
            'start'     => date('Y-m-d H:i:s', strtotime($row->start_event)),
            'end'       => date('Y-m-d H:i:s', strtotime($row->end_event)),
            'color'     => $row->color,
            'textColor' => $row->text_color,
            'classname' => $row->classname,
            'event_type' => $row->event_type,
        ];

        return response()->json($data, 201);
    }

    public function update (Request $request)
    {
        //collect data
        $error      = null;
        $id         = $request->id;
        $start      = $request->start;
        $end        = $request->end;

        //optional fields
        $title      = isset($request->title) ? $request->title: '';
        $color      = isset($request->color) ? $request->color: '';
        $text_color = isset($request->text_color) ? $request->text_color: '';
        $type = $request->type;

        //validation
        if ($start == '') {
            $error['start'] = 'Start date is required';
        }

        if ($end == '') {
            $error['end'] = 'End date is required';
        }

        //if there are no errors, carry on
        if (! isset($error)) {

            //reformat date
            $start = date('Y-m-d H:i:s', strtotime($start));
            $end = date('Y-m-d H:i:s', strtotime($end));
            
            $data['success'] = true;
            $data['message'] = 'Success!';

            //set core update array
            $update = [
                'start_event' => date('Y-m-d H:i:s', strtotime($_POST['start'])),
                'end_event' => date('Y-m-d H:i:s', strtotime($_POST['end']))
            ];

            //check for additional fields, and add to $update array if they exist

            //update database
            $user = Auth::user();
            
            $cal_event = CalEvent::find($request->id);
            $cal_event->start_event = date('Y-m-d H:i:s', strtotime($request->start));
            $cal_event->end_event = date('Y-m-d H:i:s', strtotime($request->end));
            if ($title !='') {
                $cal_event->title = $title;
                $cal_event->event_type = $type;
            }

            if ($color !='') {
                $cal_event->color = $color;
            }

            if ($text_color !='') {
                $cal_event->text_color = $text_color;
            }

            $cal_event->classname = $type == 2 ? "red-back" : "white-back";
            $cal_event->save();
        
        } else {

            $data['success'] = false;
            $data['errors'] = $error;
        }

        return response()->json($data, 201);
    }

    public function delete(Request $request)
    {
        $cal_event = CalEvent::find($request->id);
        $cal_event->delete();

        echo $request->id;
    }
}
