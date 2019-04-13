<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    const USERS = [
        [
            'contractor_id' => '1',
            'job_id' => '1',
            'reference' => '687 A',
            'OO_id' => '4546782',
            'first_name' => 'Test_1',
            'last_name' => 'Test_11',
            'status_id' => '1',
        ],
        [
            'contractor_id' => '2',
            'job_id' => '2',
            'reference' => '687 C',
            'OO_id' => '1236578',
            'first_name' => 'Test_2',
            'last_name' => 'Test_22',
            'status_id' => '2',
        ],
        [
            'contractor_id' => '3',
            'job_id' => '3',
            'reference' => '687 C',
            'OO_id' => '1284032',
            'first_name' => 'Test_3',
            'last_name' => 'Test_33',
            'status_id' => '3',
        ],
        [
            'contractor_id' => '4',
            'job_id' => '4',
            'reference' => '687 A',
            'OO_id' => '1245670',
            'first_name' => 'Test_4',
            'last_name' => 'Test_44',
            'status_id' => '4',
        ],
        [
            'contractor_id' => '1',
            'job_id' => '2',
            'reference' => '687 A',
            'OO_id' => '2134563',
            'first_name' => 'Test_5',
            'last_name' => 'Test_55',
            'status_id' => '3',
        ],
        [
            'contractor_id' => '2',
            'job_id' => '3',
            'reference' => '687 C',
            'OO_id' => '1246436',
            'first_name' => 'Test_6',
            'last_name' => 'Test_66',
            'status_id' => '1',
        ],
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::USERS as $usersData) {
            $user = new \App\User();
            $user->contractor_id = $usersData['contractor_id'];
            $user->job_id = $usersData['job_id'];
            $user->reference = $usersData['reference'];
            $user->OO_id = $usersData['OO_id'];
            $user->first_name = $usersData['first_name'];
            $user->last_name = $usersData['last_name'];
            $user->status_id = $usersData['status_id'];
            $user->save();
        }
    }
}
