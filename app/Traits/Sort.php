<?php

namespace App\Traits;

trait Sort
{
    public function scopeSort( $query )
    {
        return $query->orderBy('sort','asc');
    }
}