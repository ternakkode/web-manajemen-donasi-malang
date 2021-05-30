<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserManagement\CreateUserRequest;
use App\Http\Requests\Admin\UserManagement\UpdateUserRequest;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// DEPRECATED
class UserController extends Controller
{

    public function index()
    {
        $payload['users'] = User::where('role_id', 4)->get();

        return view('page/admin/user-management/user/index', $payload);
    }


    public function create()
    {
        return view('page/admin/user-management/user/create');
    }


    public function store(CreateUserRequest $request)
    {
        $input = $request->validated();

        $user = new User();
        $user->email = $input['email'];
        $user->password = Hash::make($input['password']);
        $user->name = $input['name'];
        $user->telephone = $input['telephone'];
        $user->role_id = 4;
        $user->is_email_verified = false;
        $user->email_verification_code = sha1(time());
        $user->save();

        return redirect('admin/user-management/user')->with('success_message', 'Berhasil membuat User baru');
    }


    public function edit($id)
    {
        $payload['user'] = User::where([
            ['role_id', '=', 4],
            ['id', '=', $id]
        ])->first();
        if (!$payload['user']) redirect('admin/user-management/user')->with('failed_message', 'Data User tidak ditemukan');

        return view('page/admin/user-management/user/update', $payload);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $input = $request->validated();

        $user = User::where([
            ['role_id', '=', 4],
            ['id', '=', $id]
        ])->first();
        if (!$user) redirect('admin/user-management/user')->with('failed_message', 'Data User tidak ditemukan');

        $user->email = $input['email'];
        $user->password = isset($input['password']) ? Hash::make($input['password']) : $user->password;
        $user->name = $input['name'];
        $user->telephone = $input['telephone'];
        $user->save();

        return redirect('admin/user-management/user')->with('success_message', 'Berhasil mengubah data User');
    }

    public function destroy($id)
    {
        $user = User::where([
            ['role_id', '=', 4],
            ['id', '=', $id]
        ])->first();
        if (!$user) redirect('admin/user-management/user')->with('failed_message', 'Data User tidak ditemukan');
        $user->delete();

        return redirect('admin/user-management/user')->with('success_message', 'Berhasil menghapus data User');
    }
}
