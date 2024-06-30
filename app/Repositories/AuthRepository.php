<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthRepository
{
    public function __construct(
        protected User $userModel
    ) {
        $this->userModel = $userModel;
    }

    public function checkEmail($email)
    {
        return $this->userModel->where('email', $email)->first();
    }

    public function checkPassword($password)
    {
        return $this->userModel->where('password', $password)->first();
    }

    public function updatePassword($oldPassword, $newPassword)
    {
        return $this->userModel->where('password', $oldPassword)->update([
            'password' => $newPassword
        ]);
    }

    public function getDashboardAccess($loginSessionId)
    {
        return $this->userModel->where('id', $loginSessionId)->first();
    }

    public function insertNewUser($user)
    {
        return $this->userModel->create($user);
    }
}
