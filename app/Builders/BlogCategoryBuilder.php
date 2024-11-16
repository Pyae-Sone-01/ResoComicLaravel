<?php

namespace App\Builders;

use App\Builders\BaseBuilder;

class BlogCategoryBuilder extends BaseBuilder
{
    public function search($value)
    {
        $this->where(function($query) use ($value) {
            $query->where('title_en',  'LIKE', "%$value%")
                    ->orWhere('title_tc','LIKE',"%$value%");

        });

        return $this;
    }

    public function whereStatus($value)
    {
        if ($value != "all") $this->where('status', $value);

        return $this;
    }

    public function filter($filters)
    {
        if ($filters->search) $this->search($filters->search);

        if (isset($filters->status)) $this->whereStatus($filters->status);

        return $this;
    }

}
