<?php

namespace App\Modules\User\Models;

use App\Modules\Role\Models\Role;
use Illuminate\Database\Eloquent\Model;
use App\Permissions\HasPermissionsTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable, HasPermissionsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function add(array $request)
    {
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),


            ]);
            $role = Role::find($request['role_id']);
            $user->roles()->attach($role);
            if($request['permissions']!=null){
                $user->givePermissionsTo(explode(',',$request['permissions']));
            }
            DB::commit();

            return $user;

            // all good
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            // something went wrong
        }

    }
    public function edit(array $request,$id)
    {
        DB::beginTransaction();
        try {
            $user = User::find($id);
            $user->name = $request['name'];
            $user->email = $request['email'];
            if($request['password']!= null){
                $user->password = bcrypt($request['password']);
            }
            $user->save();
            $role = Role::find($request['role_id']);
            $user->roles()->sync($role);
            if($request['permissions']!=null){
                $user->givePermissionsTo(explode(',',$request['permissions']));
            }
            else{
                $user->givePermissionsTo([]);
            }
            DB::commit();

            return $user;

            // all good
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            // something went wrong
        }

    }
}

