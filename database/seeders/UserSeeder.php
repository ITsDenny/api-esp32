<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Denny Mario',
            'email' => 'dennymario.id@gmail.com',
            'password' => '$2a$12$LyAEcMgfr2nPENGAPPLX9ewamMr0FJntvCFcAtOQN94gO4KCZnq9u',
            'no_hp' => '082267414308',
            'jobs' => 'Backend Developer',
            'address' => 'Jl.Tenis, Binjai',
            'profile_pict' => null,
            'is_admin' => true,
        ]);
    }
}
