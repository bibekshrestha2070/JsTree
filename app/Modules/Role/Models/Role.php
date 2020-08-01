<?php

namespace App\Modules\Role\Models;

use App\Modules\Permission\Models\Permission;
use App\Modules\User\Models\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected  $table = 'roles';
    protected $fillable = [
        'name', 'slug',
    ];
    public function permissions() {

        return $this->belongsToMany(Permission::class,'roles_permissions');

    }

    public function users() {

        return $this->belongsToMany(User::class,'users_roles');

    }
}
