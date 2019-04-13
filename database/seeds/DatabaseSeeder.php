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
        $this->call([

                CompaniesSeeder::class,
                JobsSeeder::class,
                JobStatusSeeder::class,
                StatusSeeder::class,
                EntriesSeeder::class,
                ApprovalSeeder::class,
                UsersSeeder::class
            ]
        );
    }
}
