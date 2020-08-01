<?php

namespace App\Modules\User\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Modules\User\Models\User;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends BaseController
{
    function __construct(User $user){
        $this->user = $user;
        parent::__construct();
    }
    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("User::index");
    }
    public function fetchUsersAjax()
    {

        if (request()->ajax()) {

            $user = User::with('roles')->get();

            $datatable = DataTables::of($user)
                ->addColumn('role_name', function ($data) {
                    if (isset($data->roles[0]->name)) {
                        return $data->roles[0]->name;
                    } else {
                        return '';
                    }
                })
                ->addColumn('action', function ($data) {

                    return '<a href="' . route('edit.user', $data->id) . '" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a> 
<a href="' . route('delete.user', $data->id) . '" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>';
                })
                ->rawColumns(['action']);

            return $datatable->make(true);
        }
    }
    public function create()
    {


        return view("User::add");
    }

    public function edit($id)
    {

        $user = User::with('roles')->find($id);


        return view('User::edit', compact('user'));
    }

    public function store(Request $request){
        if (request()->ajax()) {
            $rules = [
                'name' => 'required',
                'email' => 'required|unique:users',
                'role_id' => 'required',
                'password' => 'required | min:8',

            ];
            $validator = \Validator::make($request->all(), $rules);
            if ($validator->fails()){
                return $this->fail(['errors' => $validator->getMessageBag()->toArray()]);
            }
            else{

                $result = $this->user->add($request->all());
                if($result){
                    Flash::success('User Successfully Added!');
                    return $this->success(['message' => 'User Successfully Added!']);
                }
            }
        }
    }
    public function update(Request $request,$id){
        if (request()->ajax()) {
            $rules = [
                'name' => 'required',
                'email' => 'required|unique:users,email,'. $id,
                'role_id' => 'required',

            ];
            $validator = \Validator::make($request->all(), $rules);
            if ($validator->fails()){
                return $this->fail(['errors' => $validator->getMessageBag()->toArray()]);
            }
            else{

                $result = $this->user->edit($request->all(),$id);
                if($result){
                    Flash::success('User Successfully Updated!');
                    return $this->success(['message' => 'User Successfully Updated!']);
                }
            }
        }
    }

    public function delete($id)
    {
        $user = User::with('roles','permissions')->find($id);
        if($user){
            $user->delete();
            Flash::success('User Successfully Deleted!');

        }
        else{
            Flash::error('No User Found');
        }

        return back();

    }
}
