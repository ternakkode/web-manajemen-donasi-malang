<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerView() {
        return view('page/auth/register');
    }

    public function registerProcess(RegisterRequest $request) {
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

        return redirect('auth/login')->with('success_message', 'Telah berhasil registrasi, silahkan login');
    }

    public function loginView() {
        
        return view('page/auth/login');
    }

    public function loginProcess(LoginRequest $request) {
        $input = $request->validated();

        if (!auth()->attempt($input)) {
            return redirect('auth/login')->with('failed_message', 'Akun anda tidak sesuai');
        }

        return redirect('/admin')->with('success_message', 'Telah berhasil login');
    }

    public function logoutProcess(Request $request) {
        auth()->logout();

        return redirect('auth/login');
    }
}
