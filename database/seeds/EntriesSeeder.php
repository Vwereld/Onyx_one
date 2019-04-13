<?php

use Illuminate\Database\Seeder;

class EntriesSeeder extends Seeder
{
    const ENTRIES = [
        [
            'job_id' => '1',
            'user_id' => '1',
            'job_status_id' => '1',
        ],
        [
            'job_id' => '2',
            'user_id' => '3',
            'job_status_id' => '2',
        ],
        [
            'job_id' => '3',
            'user_id' => '2',
            'job_status_id' => '3',
        ],
        [
            'job_id' => '4',
            'user_id' => '4',
            'job_status_id' => '5',
        ],
        [
            'job_id' => '2',
            'user_id' => '2',
            'job_status_id' => '4',
        ],
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::ENTRIES as $entriesData) {
            $entry = new \App\Entry();
            $entry->job_id = $entriesData['job_id'];
            $entry->user_id = $entriesData['user_id'];
            $entry->job_status_id = $entriesData['job_status_id'];
            $entry->save();
        }
    }
}
