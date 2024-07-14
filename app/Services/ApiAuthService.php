<?php

namespace App\Services;

use App\Http\Requests\ApiAuthLoginRequest;
use App\Repositories\ApiAuthRepository;
use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Hash;

class ApiAuthService
{
    public function __construct(
        protected AuthRepository $authRepository
    ) {
        // $this->apiAuthRepository = $apiAuthRepository;
        $this->authRepository = $authRepository;
    }

    public function apiLogin(ApiAuthLoginRequest $request)
    {
        $user = $this->authRepository->checkEmail($request->email);

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'meta' => [
                    'success' => false,
                    'code' => 401,
                    'message' => 'Email or password is incorrect.'
                ],
                'data' => null
            ], 401);
        }

        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json([
            'meta' => [
                'success' => true,
                'code' => 200,
                'message' => 'Login successful.'
            ],
            'data' => [
                'name' => $user->name,
                'jobs' => $user->jobs,
                'address' => $user->address,
                'no_hp' => $user->no_hp,
                'profile_pict' => $user->profile_pict,
                'access_token' => $token,
            ]
        ], 200);
    }
}
