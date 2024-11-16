<?php

namespace App\Builders;

use App\Builders\BaseBuilder;

class FaqBuilder extends BaseBuilder
{
    public function search($value)
    {
        $this->where('titles',  'LIKE', "%$value%");

        return $this;
    }

    public function whereStatus($value)
    {
        if ($value != "all") $this->where('status', $value);

        return $this;
    }

    public function whereCategory($value)
    {
        $this->where('faq_category_id', $value);

        return $this;
    }

    public function filter($filters)
    {
        if ($filters->search) $this->search($filters->search);

        if (isset($filters->status)) $this->whereStatus($filters->status);

        if ((isset($filters->category)) && ($filters->category != "")) $this->whereCategory($filters->category);

        return $this;
    }
}
