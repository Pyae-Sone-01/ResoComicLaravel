<?php

namespace App\Interfaces\Repositories;

use App\Interfaces\Repositories\BaseRepositoryInterface;


interface BlogRepositoryInterface extends BaseRepositoryInterface
{
    public function updateStatus($request);

    public function updateSort($request);
    
}