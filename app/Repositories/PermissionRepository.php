<?php

namespace App\Repositories;

use App\Interfaces\Repositories\PermissionRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\Permission;;

class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{
    public function __construct(Permission $permission)
    {
        $this->model = $permission;
    }
}
