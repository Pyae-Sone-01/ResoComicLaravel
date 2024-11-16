<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Admin\AdminRolePermission;
use App\Http\Requests\Admin\Role\StoreRoleRequest;
use App\Http\Requests\Admin\Role\UpdateRoleRequest;
use App\Interfaces\Repositories\RoleRepositoryInterface;

class RoleController extends Controller
{
    use AdminRolePermission;

    public function __construct(private RoleRepositoryInterface $roleRepository)
    {

    }

    public function index(Request $request)
    {
        if (!$this->adminHasPermission('roles.listing')) {
            return redirect()->back()->with('warning', 'You are not allowed to access this process');
        }

        $data          = $this->roleRepository->getAll($request,$request->display);

        return view('admin.role.index')->with(['data' => $data]);
    }
    public function create()
    {
        if (!$this->adminHasPermission('roles.create')) {
            return redirect()->back()->with('warning', 'You are not allowed to access this process');
        }

        $permissions = Permission::get();

        return view('admin.role.create',compact('permissions'));
    }

    public function store(StoreRoleRequest $request)
    {
        if (!$this->adminHasPermission('roles.create')) {
            return redirect()->back()->with('warning', 'You are not allowed to access this process');
        }

        $this->roleRepository->create($request->toArray());

        return redirect('admin/role')->with('flash_message', 'Role added!');
    }

    public function edit(Role $role)
    {
        if (!$this->adminHasPermission('roles.edit')) {
            return redirect()->back()->with('warning', 'You are not allowed to access this process');
        }
        
        $permissions = Permission::get();

        return view('admin.role.edit', compact('role','permissions'));
    }

    public function update(Role $role,UpdateRoleRequest $request)
    {
        if (!$this->adminHasPermission('roles.edit')) {
            return redirect()->back()->with('warning', 'You are not allowed to access this process');
        }

        $this->roleRepository->update($role,$request->toArray());

        return redirect('admin/role')->with('flash_message', 'Role updated!');

    }

    public function destroy(Role $role)
    {
        if (!$this->adminHasPermission('roles.delete')) {
            return redirect()->back()->with('warning', 'You are not allowed to access this process');
        }

        $this->roleRepository->delete($role);

        return redirect('admin/role')->with('flash_message', 'Role deleted!');
    }
}
