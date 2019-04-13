<?php
/**
 * Created by PhpStorm.
 * User: Vitaly
 * Date: 08/04/2019
 * Time: 13:56
 */
namespace App\Repositories;


use App\JobStatus;

class JobStatusRepository extends Repository
{
    public function __construct(JobStatus $jobStatus)
    {
        $this->model = $jobStatus;
    }
}
