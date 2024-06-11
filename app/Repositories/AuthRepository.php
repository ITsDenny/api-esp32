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

    public function getDashboardAccess($loginSessionId)
    {
        return $this->userModel->where('id', $loginSessionId)->first();
    }
}
