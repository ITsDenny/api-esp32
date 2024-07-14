<?php

namespace App\Services;

use App\Http\Requests\ApiAuth\UpdatePassswordRequest;
use App\Http\Requests\ApiAuthLoginRequest;
use App\Http\Requests\ApiAuthRegisterRequest;
use App\Repositories\ApiAuthRepository;
use App\Repositories\AuthRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ApiAuthService
{
    public function __construct(
        protected AuthRepository $authRepository
    ) {
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

    public function apiUpdatePassword(UpdatePassswordRequest $request)
    {
        return $oldPassword = $this->authRepository->checkPassword(Hash::check($request->password));

        if (!$oldPassword) {
            return response()->json([
                'meta' => [
                    'success' => false,
                    'code' => 422,
                    'message' => 'Password doesnt match!'
                ],
            ], 422);
        }

        $updatePassword = $this->authRepository->updatePassword($oldPassword, $request->password);

        if (!$updatePassword) {
            return response()->json([
                'meta' => [
                    'success' => false,
                    'code' => 422,
                    'message' => 'Update failed!'
                ],
            ], 422);
        }

        return response()->json([
            'meta' => [
                'success' => true,
                'code' => 200,
                'message' => 'Login successful.'
            ],
            'data' => [
                'user' => $updatePassword
            ]
        ]);
    }

    public function apiRegister(ApiAuthRegisterRequest $request)
    {
        $newUser = [
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'no_hp' => $request->no_hp,
            'jobs' => $request->jobs,
            'address' => $request->address,
            'profile_pict' => $request->profile_pict,
            'is_admin' => false
        ];
        $save = $this->authRepository->insertNewUser($newUser);

        if (!$save) throw new HttpException(422, 'eror while saving user!');

        return response()->json([
            'meta' => [
                'success' => true,
                'code' => 200,
                'message' => 'Login successful.'
            ],
            'data' => [
                'user' => $save
            ]
        ]);
    }
}
