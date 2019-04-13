<?php

use Illuminate\Database\Seeder;

class JobsSeeder extends Seeder
{
    const JOBS = [
        [
            'job' => '0500064/0',
            'contractor_id' => '1',
            'approval_id' => '1',
            'job_type' => 'test_job_type_1',
            'user_id' => '2',
            'start_date' => null,
            'end_date' => null,
        ],
        [
            'job' => '0500065/0',
            'contractor_id' => '3',
            'approval_id' => '2',
            'job_type' => 'test_job_type_2',
            'user_id' => '1',
            'start_date' => null,
            'end_date' => null,
        ],
        [
            'job' => '0500066/0',
            'contractor_id' => '2',
            'approval_id' => '3',
            'job_type' => 'test_job_type_3',
            'user_id' => '3',
            'start_date' => null,
            'end_date' => null,
        ],
        [
            'job' => '0500067/0',
            'contractor_id' => '4',
            'approval_id' => '4',
            'job_type' => 'test_job_type_4',
            'user_id' => '4',
            'start_date' => null,
            'end_date' => null,
        ],
        [
            'job' => '0500068/0',
            'contractor_id' => '2',
            'approval_id' => '3',
            'job_type' => 'test_job_type_5',
            'user_id' => '1',
            'start_date' => null,
            'end_date' => null,
        ],
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::JOBS as $jobsData) {
            $job = new \App\Job();
            $job->job = $jobsData['job'];
            $job->contractor_id = $jobsData['contractor_id'];
            $job->approval_id = $jobsData['approval_id'];
            $job->job_type = $jobsData['job_type'];
            $job->user_id = $jobsData['user_id'];
            $job->start_date = $jobsData['start_date'];
            $job->end_date = $jobsData['end_date'];
            $job->save();
        }
    }
}
