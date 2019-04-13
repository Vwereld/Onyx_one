<?php
/**
 * Created by PhpStorm.
 * User: Vitaly
 * Date: 08/04/2019
 * Time: 13:56
 */
namespace App\Repositories;


use App\Job;

class JobRepository extends Repository
{
    public function __construct(Job $job)
    {
        $this->model = $job;
    }
}
