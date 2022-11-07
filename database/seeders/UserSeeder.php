<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id'                => 1,
            'name'              => 'Jhon',
            'email'             => 'admin@email.com',
            'role_id'           =>  Role::all()->first()['id'],
            'user_name'         => 'Administrator',
            'password'          => Hash::make('AdminRoom911'),
        ]);
        User::create([
            'id'                => 2,
            'name'              => 'Carl',
            'email'             => 'user@email.com',
            'role_id'           =>  Role::all()->first()['id'],
            'user_name'         => 'User',
            'password'          => Hash::make('CarlRoom911'),
        ]);
    }
}
