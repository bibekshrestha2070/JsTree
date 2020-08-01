<?php

namespace App\Modules\Role\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Modules\Role\Models\Role;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class RoleController extends BaseController
{
    function __construct(){

        parent::__construct();
    }
    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view("Role::index",compact('roles'));
    }
    public function create()
    {
        return view("Role::add");
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:roles',
            'slug' => 'required|unique:roles'
        ]);
        Role::create(['name' => $request->name,'slug'=>$request->slug]);
        Flash::success('Role added successfully');
        return redirect()->route('role.index');


    }

    public function edit($id)
    {
        $role = Role::find($id);
        return view("Role::edit",compact('role'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,'. $id ,
            'slug' => 'required|unique:roles,slug,'. $id ,
        ]);
        $role = Role::find($id);
        $role->name = $request->name;
        $role->slug = $request->slug;
        $role->save();
        Flash::success('Role updated successfully');
        return redirect()->route('role.index');

    }
}
