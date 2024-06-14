<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        protected User $user
    ) {
        $this->user = $user;
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:4',
            'email' => 'required|email',
            'no_hp' => 'required|string|min:11',
            'jobs' => 'required|string|min:5',
            'address' => 'required|string|min:15',
            'profile_pict' => 'nullable'
        ]);

        $isAdmin = false;
        $password = bcrypt('12345678');

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'no_hp' => $request->input('no_hp'),
            'jobs' => $request->input('jobs'),
            'address' => $request->input('address'),
            'password' => $password,
            'is_admin' => $isAdmin,
            'profile_pict' => $request->input('profile_pict')
        ]);
    }
}
