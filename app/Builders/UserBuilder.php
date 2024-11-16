<?php

namespace App\Builders;

use App\DTOs\UserListFilter;

class UserBuilder extends BaseBuilder
{
    public function search($value)
    {
        $this->where('name', 'LIKE', "%$value%");

        return $this;
    }

    public function filter(UserListFilter $filters)
    {
        if ($filters->keyword) $this->search($filters->keyword);

        return $this;
    }

}
