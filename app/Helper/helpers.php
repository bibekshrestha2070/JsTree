<?php
if (! function_exists('roles')) {
    function roles() {
        $roles = \Illuminate\Support\Facades\DB::table('roles')->pluck('name','id')->toArray();
        return $roles;
    }
}

if (! function_exists('ParentPermissions')) {
    function ParentPermissions() {
        $permissions = \App\Modules\Permission\Models\Permission::where('parent_id',0)->pluck('name','id')->toArray();
        return $permissions;
    }
}