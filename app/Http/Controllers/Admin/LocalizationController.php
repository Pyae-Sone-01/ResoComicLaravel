<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    public function changeTo($lang)
    {
        session(['locale' => $lang]);

        return redirect()->back();
    }
}
