<?php
/**
 * Created by PhpStorm.
 * User: Vitaly
 * Date: 08/04/2019
 * Time: 13:56
 */
namespace App\Repositories;


use App\Status;

class StatusRepository extends Repository
{
    public function __construct(Status $status)
    {
        $this->model = $status;
    }
}
