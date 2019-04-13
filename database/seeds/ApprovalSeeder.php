<?php

use Illuminate\Database\Seeder;

class ApprovalSeeder extends Seeder
{
    const APPROVES = [
        [
            'approval' => 'Approved',
        ],
        [
            'approval' => 'Denied',
        ],
        [
            'approval' => 'Submited',
        ],
        [
            'approval' => 'To be submited',
        ],
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::APPROVES as $approvmentsData) {
            $approves = new \App\Approval();
            $approves->approval = $approvmentsData['approval'];
            $approves->save();
        }
    }
}
