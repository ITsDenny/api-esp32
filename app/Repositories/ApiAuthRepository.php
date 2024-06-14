<?php

namespace App\Repositories;

use App\Models\User;

class ApiAuthRepository
{

    public function __construct(
        protected User  $userModel
    ) {
        $this->userModel = $userModel;
    }

    public function apiLogin()
    {
    }
}
