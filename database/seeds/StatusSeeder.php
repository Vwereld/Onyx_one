<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    const STATUS = [
        [
            'status' => 'To be completed'
        ],
        [
            'status' => 'Complete onsite training'
        ],
        [
            'status' => 'Not compliant'
        ],
        [
            'status' => 'Compliant'
        ],
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::STATUS as $statusData) {
            $status = new \App\Status();
            $status->status = $statusData['status'];
            $status->save();
        }
    }
}
