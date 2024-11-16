<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\DTOs\UserListFilter;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Traits\Admin\AdminRolePermission;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Interfaces\Repositories\UserRepositoryInterface;

class UserController extends Controller
{
    use AdminRolePermission;

    public function __construct(private UserRepositoryInterface $userRepository)
    {

    }

    public function index(Request $request)
    {
        if (!$this->adminHasPermission('users.listing')) {
            return redirect()->back()->with('warning', 'You are not allowed to access this process');
        }


        $perPage = $request->display ?: 10;

        $filters = new UserListFilter($request);

        $data = $this->userRepository->getAll($filters, $perPage,'roles');

        return view('admin.user.index')->with(['data' => $data]);
    }

    public function create()
    {
        if (!$this->adminHasPermission('users.create')) {
            return redirect()->back()->with('warning', 'You are not allowed to access this process');
        }

        $roles = Role::select('id', 'name', 'label')->pluck('name', 'id');

        return view('admin.user.create', compact('roles'));

    }

    public function store(StoreUserRequest $request)
    {
        if (!$this->adminHasPermission('users.create')) {
            return redirect()->back()->with('warning', 'You are not allowed to access this process');
        }

        $this->userRepository->create($request->toArray());

        return redirect('admin/user')->with('flash_message', 'User added!');
    }

    public function edit(User $user)
    {
        if (!$this->adminHasPermission('users.edit')) {
            return redirect()->back()->with('warning', 'You are not allowed to access this process');
        }

        $roles = Role::select('id', 'name', 'label')->pluck('name',  'id');

        return view('admin.user.edit', compact('user','roles'));
    }

    public function update(User $user,UpdateUserRequest $request)
    {
        if (!$this->adminHasPermission('users.edit')) {
            return redirect()->back()->with('warning', 'You are not allowed to access this process');
        }

        $this->userRepository->update($user,$request->toArray());

        return redirect('admin/user')->with('flash_message', 'User updated!');

    }

    public function destroy(User $user)
    {
        if (!$this->adminHasPermission('users.delete')) {
            return redirect()->back()->with('warning', 'You are not allowed to access this process');
        }

        $user = $this->userRepository->delete($user);

        return redirect('admin/users')->with('flash_message', 'User deleted!');
    }
}
