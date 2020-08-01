<?php

namespace App\Modules\Permission\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Modules\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class PermissionController extends BaseController
{
    function __construct(){

        parent::__construct();
    }
    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("Permission::welcome");
    }

    public function getPermissions(Request $request){
        if(isset($request->user_id) && $request->user_id != ''){
            $user_id=$request->user_id;
        }
        else{
            $user_id=0;
        }
        $permission = Permission::with('children')->where('parent_id','=',0)->get();
        $data = [];
        $i=0;
        foreach($permission as $permissionItem){

            $data[$i] = ['id'=>$permissionItem->slug , 'parent'=>'#','text'=>$permissionItem->name,'icon'=>'fa fa-home','state'=>['opened'=>($permissionItem->children->isEmpty())? false:true]];
            $i++;
            if( ! $permissionItem->children->isEmpty() ){

                foreach($permissionItem->children as $permissionSubMenuItem){

                    $data[$i] = ['id'=>$permissionSubMenuItem->slug , 'parent'=>$permissionItem->slug,'text'=>$permissionSubMenuItem->name,'state'=>['selected'=>($permissionSubMenuItem->users->where('id',$user_id)->toArray())? true:false]];
                    $i++;
                }
            }

        }

        return response()->json($data);

    }
    public function index()
    {
        $permissions = Permission::all();
        return view("Permission::index",compact('permissions'));
    }
    public function create()
    {
        return view("Permission::add");
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:permissions',
            'slug' => 'required|unique:permissions'
        ]);
        Permission::create([
            'name' => $request->name,
            'slug'=>$request->slug,
            'parent_id'=>($request->parent_id != '')?$request->parent_id:0
        ]);
        Flash::success('Permission added successfully');
        return redirect()->route('permission.index');


    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        return view("Permission::edit",compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,'. $id ,
            'slug' => 'required|unique:permissions,slug,'. $id ,
        ]);
        $permission = Permission::find($id);
        $permission->name = $request->name;
        $permission->slug = $request->slug;
        $permission->parent_id=($request->parent_id != '')?$request->parent_id:0;
        $permission->save();
        Flash::success('Permission updated successfully');
        return redirect()->route('permission.index');

    }
}
