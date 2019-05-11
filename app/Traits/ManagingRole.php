<?php

namespace App\Traits;

trait ManagingRole
{
    public function changeRoleDepartmentAdmin($id)
    {
        \App\Models\User::whereId($id)->update(['role' => config('setting.roles.admin_department')]);
    }
}
