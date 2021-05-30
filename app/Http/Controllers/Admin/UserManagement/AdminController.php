<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserManagement\CreateAdminRequest;
use App\Http\Requests\Admin\UserManagement\UpdateAdminRequest;
use App\Model\Role;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index()
    {
        $payload['users'] = User::with('role')->where('role_id', '!=', 4)->get();

        return view('page/admin/user-management/admin/index', $payload);
    }


    public function create()
    {
        $payload['roles'] = Role::where('id', '!=', 4)->get();
        return view('page/admin/user-management/admin/create', $payload);
    }


    public function store(CreateAdminRequest $request)
    {
        $input = $request->validated();

        $user = new User();
        $user->email = $input['email'];
        $user->password = Hash::make($input['password']);
        $user->name = $input['name'];
        $user->telephone = $input['telephone'];
        $user->role_id = $input['role_id'];
        $user->save();

        return redirect('admin/user-management/admin')->with('success_message', 'Berhasil membuat Admin baru');
    }


    public function edit($id)
    {
        $payload['user'] = User::where([
            ['role_id', '!=', 4],
            ['id', '=', $id]
        ])->first();
        if (!$payload['user']) redirect('admin/user-management/user')->with('failed_message', 'Data Admin tidak ditemukan');
        $payload['roles'] = Role::where('id', '!=', 4)->get();

        return view('page/admin/user-management/admin/update', $payload);
    }

    public function update(UpdateAdminRequest $request, $id)
    {
        $input = $request->validated();

        $user = User::where([
            ['role_id', '!=', 4],
            ['id', '=', $id]
        ])->first();
        if (!$user) redirect('admin/user-management/admin')->with('failed_message', 'Data Admin tidak ditemukan');

        $user->email = $input['email'];
        $user->password = isset($input['password']) ? Hash::make($input['password']) : $user->password;
        $user->name = $input['name'];
        $user->telephone = $input['telephone'];
        $user->role_id = $input['role_id'];
        $user->save();

        return redirect('admin/user-management/admin')->with('success_message', 'Berhasil mengubah data Admin');
    }

    public function destroy($id)
    {
        $user = User::where([
            ['role_id', '!=', 4],
            ['id', '=', $id]
        ])->first();
        if (!$user) redirect('admin/user-management/admin')->with('failed_message', 'Data Admin tidak ditemukan');
        $user->delete();

        return redirect('admin/user-management/admin')->with('success_message', 'Berhasil menghapus data Admin');
    }
}
