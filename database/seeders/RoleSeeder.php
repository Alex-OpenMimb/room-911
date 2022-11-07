<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < count(Role::NAME); $i++) {
            Role::create([
                'id'    => $i+1,
                'name'  => Role::NAME[$i],
            ]);
        }
    }
}
