<?php

namespace App\Repositories;

use App\Models\Role;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Interfaces\Repositories\RoleRepositoryInterface;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    public function __construct(Role $role)
    {
        $this->model = $role;
    }

    public function create(array $data): Model
    {
        $role = $this->model->create($data);

        $role->syncPermissions($data['permissions']);

        return $role;
    }

    public function update(Model $role, array $data): bool
    {
        
        $role->syncPermissions($data['permissions']);
        
        return $role->update($data);
    }

}
