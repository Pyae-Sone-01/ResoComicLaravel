<?php

namespace App\Builders;

class RoleBuilder extends BaseBuilder
{
    public function search($value)
    {
        $this->where('name', 'LIKE', "%$value%");

        return $this;
    }

    public function filter($filters)
    {
        if ($filters->keyword) $this->search($filters->keyword);

        return $this;
    }

}
