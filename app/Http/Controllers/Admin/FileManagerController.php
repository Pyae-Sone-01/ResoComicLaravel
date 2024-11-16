<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Admin\AdminRolePermission;

class FileManagerController extends Controller
{
    use AdminRolePermission;
    
    public function index(Request $request)
    {
        if(!$this->adminHasPermission('media_library.listing')){
            return redirect()->back()->with('warning', 'You are not allowed to access this process');
        }

        return view('admin.filemanager.index');
    }
}
