<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Admin\AdminRolePermission;
use App\Http\Requests\Admin\Permission\PermissionFormRequest;
use App\Interfaces\Repositories\PermissionRepositoryInterface;

class PermissionController extends Controller
{
    use AdminRolePermission;

    public function __construct(private PermissionRepositoryInterface $permissionRepository)
    {

    }

    public function index(Request $request)
    {
        if (!$this->adminHasPermission('permissions.listing')) {
            return redirect()->back()->with('warning', 'You are not allowed to access this process');
        }

        $data = $this->permissionRepository->getAll($request,$request->display);

        return view('admin.permission.index')->with(['data' => $data]);
    }

    public function create()
    {
        if (!$this->adminHasPermission('permissions.create')) {
            return redirect()->back()->with('warning', 'You are not allowed to access this process');
        }
        return view('admin.permission.create');
    }

    public function store(PermissionFormRequest $request)
    {
        if (!$this->adminHasPermission('permissions.create')) {
            return redirect()->back()->with('warning', 'You are not allowed to access this process');
        }

        $this->permissionRepository->create($request->toArray());

        return redirect('admin/permission')->with('flash_message', 'Permission added!');
    }

    public function edit(Permission $permission)
    {
        if (!$this->adminHasPermission('permissions.edit')) {
            return redirect()->back()->with('warning', 'You are not allowed to access this process');
        }

        return view('admin.permission.edit', compact('permission'));
    }

    public function update(Permission $permission,PermissionFormRequest $request)
    {
        if (!$this->adminHasPermission('permissions.edit')) {
            return redirect()->back()->with('warning', 'You are not allowed to access this process');
        }

        $this->permissionRepository->update($permission,$request->toArray());

        return redirect('admin/permission')->with('flash_message', 'Permission updated!');

    }

    public function destroy(Permission $permission)
    {
        if (!$this->adminHasPermission('permissions.delete')) {
            return redirect()->back()->with('warning', 'You are not allowed to access this process');
        }

        $this->permissionRepository->delete($permission);

        return redirect('admin/permission')->with('flash_message', 'Permission deleted!');
    }
}
