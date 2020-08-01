<?php

namespace App\Modules\Permission\Models;

use App\Modules\Role\Models\Role;
use App\Modules\User\Models\User;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected  $table = 'permissions';
    protected $fillable = [
        'name', 'slug','parent_id'
    ];
    public function roles() {

        return $this->belongsToMany(Role::class,'roles_permissions');

    }

    public function users() {

        return $this->belongsToMany(User::class,'users_permissions');

    }

    public function parent()
    {
        return $this->belongsTo(Permission::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Permission::class, 'parent_id');
    }

}
