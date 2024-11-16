<?php

namespace App\DTOs;

use Illuminate\Http\Request;

class UserListFilter
{
    public ?string $keyword;
    public ?string $status;

    public function __construct(Request $request)
    {
        $this->keyword           = $request->get('search');
        $this->status            = $request->status ?? 'all';
    }
}
