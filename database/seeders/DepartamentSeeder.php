<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < count(Department::NAME); $i++) {
            Department::create([
                'id'    => $i+1,
                'name'  => Department::NAME[$i],
            ]);
        }
    }
}
