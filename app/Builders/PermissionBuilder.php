<?php

namespace App\Builders;

class PermissionBuilder extends BaseBuilder
{
    public function search($value)
    {
        $this->where('name', 'LIKE', "%$value%");

        return $this;
    }

    public function filter($filters)
    {
        if ($filters->search) $this->search($filters->search);

        return $this;
    }

}
