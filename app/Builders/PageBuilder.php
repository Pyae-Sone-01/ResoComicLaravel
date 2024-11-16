<?php

namespace App\Builders;

use Illuminate\Support\Str;
use App\Builders\BaseBuilder;

class PageBuilder extends BaseBuilder
{
    public function search($value)
    {
        $value = Str::lower($value);
        $this->where('titles->en', 'LIKE', "%$value%")->orWhere('titles->tc', 'LIKE', "%value%");

        return $this;
    }


    public function filter($filters)
    {
        if ($filters->search) $this->search($filters->search);

        return $this;
    }
}
