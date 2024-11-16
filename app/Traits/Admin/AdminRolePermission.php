<?php

namespace App\Traits\Admin;

trait AdminRolePermission
{
    public function adminHasRole(string $role = ''): bool
    {
        return auth()->user()->hasRole($role);
    }

    public function adminHasPermission(string $permission): bool
    {
        return auth()->user()->can($permission);
    }
}
