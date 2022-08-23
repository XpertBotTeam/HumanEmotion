<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $role1=\App\Models\Role::factory()->create([
            'roleName' => 'Officer',
        ]);

        $role2=\App\Models\Role::factory()->create([
            'roleName' => 'Citizen',
        ]);
    }
}
