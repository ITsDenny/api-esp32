<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;

class WebLoginController extends Controller
{

    public function __construct(
        protected AuthService $authService
    ) {
        $this->authService = $authService;
    }

    public function showLoginForm()
    {
        return view('auth.web_login_view');
    }

    public function login(Request $request)
    {
        $login = $this->authService->login($request);

        return $login;
    }

    public function dashboard()
    {
        $dashboard = $this->authService->dashboard();

        return $dashboard;
    }

    public function logout()
    {
        $logout = $this->authService->logout();

        return $logout;
    }
}
