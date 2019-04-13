<?php
/**
 * Created by PhpStorm.
 * User: Vitaly
 * Date: 08/04/2019
 * Time: 13:56
 */
namespace App\Repositories;


use App\Approval;

class ApprovalsRepository extends Repository
{
    public function __construct(Approval $approval)
    {
        $this->model = $approval;
    }
}
