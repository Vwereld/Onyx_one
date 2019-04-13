<?php
/**
 * Created by PhpStorm.
 * User: Vitaly
 * Date: 08/04/2019
 * Time: 13:56
 */
namespace App\Repositories;


use App\Company;

class CompaniesRepository extends Repository
{
    public function __construct(Company $company)
    {
        $this->model = $company;
    }
}
