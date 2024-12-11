<?php

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
        \App\Models\Department::insert([
            ['name' => 'Sales and Marketing', 'created_at' => now()],
            ['name' => 'Application Development', 'created_at' => now()],
        ]);

        \App\Models\Designation::insert([
            ['name' => 'Marketing Manager', 'created_at' => now()],
            ['name' => 'Mobile Application Developer', 'created_at' => now()],
        ]);

        \App\Models\User::insert([
            [
                'name' => 'Jhon Due',
                'fk_department' => 1,
                'fk_designation' => 1,
                'phone_number' => '1234567890',
                'created_at' => now(),
            ],
            [
                'name' => 'Tommy Mark',
                'fk_department' => 2,
                'fk_designation' => 2,
                'phone_number' => '9876543210',
                'created_at' => now(),
            ],
        ]);
    }
}
