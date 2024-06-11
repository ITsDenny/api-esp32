<?php

namespace App\Services;

use App\Repositories\AuthRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthService
{
    public function __construct(
        protected AuthRepository $authRepository
    ) {
        $this->authRepository = $authRepository;
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email:users',
            'password' => 'required|min:8'
        ]);

        $user = $this->authRepository->checkEmail($request->email);

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginSessionId', $user->id);

                return redirect('/admin/dashboard');
            } else {
                return back()->with('fail', 'Password not match!');
            }
        } else {
            return back()->with('fail', 'Email not registered!');
        }
    }

    public function dashboard()
    {
        $data = array();
        if (Session::has('loginSessionId')) {
            $loginSessionId = Session::get('loginSessionId');
            $data = $this->authRepository->getDashboardAccess($loginSessionId);
        }

        return view('admin.AdminDashboard', compact('data'));
    }

    public function logout()
    {
        $data = array();
        if (Session::has('loginSessionId')) {
            Session::pull('loginSessionId');
            return redirect('/admin/login');
        }
    }
}
