<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiAuth\UpdatePassswordRequest;
use App\Http\Requests\ApiAuthLoginRequest;
use App\Http\Requests\ApiAuthRegisterRequest;
use App\Services\ApiAuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(
        protected ApiAuthService $apiAuthService
    ) {
        $this->apiAuthService = $apiAuthService;
    }

    public function apiLogin(ApiAuthLoginRequest $request)
    {
        return $this->apiAuthService->apiLogin($request);
    }

    public function apiRegister(ApiAuthRegisterRequest $request)
    {
        return $this->apiAuthService->apiRegister($request);
    }

    public function apiUpdatePassword(UpdatePassswordRequest $request)
    {
        return $this->apiAuthService->apiUpdatePassword($request);
    }
}
