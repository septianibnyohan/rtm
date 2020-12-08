<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DataTableUserCrudController extends Controller
{
    public function index() 
    {
        if(request()->ajax()) {
            return datatables()->of(User::select([
                'id', 'first_name','last_name' , 'email'
            ]))
            ->addIndexColumn()
            ->addColumn('action', function($data){
                   
                   $editUrl = url('edit-user/'.$data->id);
                   $btn = '<a href="'.$editUrl.'" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary btn-sm">Edit</a>';

                   $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteUser">Delete</a>';

                    return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('user.list-user', ["page_title" => "List User"]);
    }
    
    /* Display user add form */
    public function create()
    {
      return view('user.add-user', ["page_title" => "Add User"]);
    }

    /* insert user list into mysql database*/
    public function store(Request $request)
    {
        $data = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
        ]);
       
        $check = User::create($data);
        return Redirect::to("list-user")->withSuccess('Great! User has been inserted');
    }

    /* display edit user form with data */
    public function edit(Request $request, $id)
    {
       
        $data['user'] = User::where('id', $id)->first();
        $data['page_title'] = "Edit User";

        if(!$data['user']){
           return redirect('/list-user');
        }
        return view('user.edit-user', $data);
    }

    /* update todo into mysql database */

    public function update(Request $request)
    {
        $data = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
        ]);
       
        if(!$request->id){
           return redirect('/list-user');
        }

        $check = User::where('id', $request->id)->update($data);
        return Redirect::to("list-user")->withSuccess('Great! User has been updated');
    }  

    /* delete todo from mysql database */

    public function delete(Request $request, $id)
    {
        $check = User::where('id', $id)->delete();
 
        return Response::json($check);
    }
}
