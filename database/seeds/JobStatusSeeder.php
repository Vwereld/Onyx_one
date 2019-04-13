<?php

use Illuminate\Database\Seeder;

class JobStatusSeeder extends Seeder
{
    const JOBSTATUS = [
        [
            'job_status' => 'Active',
            'an_printed' => '0',
            'printed_date' => null,
        ],
        [
            'job_status' => 'Draft',
            'an_printed' => '0',
            'printed_date' => null,
        ],
        [
            'job_status' => 'Expired',
            'an_printed' => '0',
            'printed_date' => null,
        ],
        [
            'job_status' => 'My_entries',
            'an_printed' => '0',
            'printed_date' => null,
        ],
        [
            'job_status' => 'Temp_company',
            'an_printed' => '0',
            'printed_date' => null,
        ],
        [
            'job_status' => 'Expired_entries',
            'an_printed' => '0',
            'printed_date' => null,
        ],
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::JOBSTATUS as $jobStatusData) {
            $jobStatus = new \App\JobStatus();
            $jobStatus->job_status = $jobStatusData['job_status'];
            $jobStatus->an_printed = $jobStatusData['an_printed'];
            $jobStatus->printed_date = $jobStatusData['printed_date'];
            $jobStatus->save();
        }
    }
}
