<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use App\Interfaces\Repositories\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function create(array $data): Model
    {
        $data['password'] = Hash::make($data['password']);

        $user = $this->model->create($data);

        $user->syncRoles($data['roles']);

        return $user;

    }

    public function update(Model $user, array $data): bool
    {
        $data['password'] = isset($data['password']) ? Hash::make($data['password']) : $user->password;

        $user->syncRoles($data['roles']);

        return $user->update($data);
    }

    
}
