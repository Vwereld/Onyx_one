<?php
/**
 * Created by PhpStorm.
 * User: Vitaly
 * Date: 08/04/2019
 * Time: 13:56
 */
namespace App\Repositories;


use App\Entry;

class EntriesRepository extends Repository
{
    public function __construct(Entry $entry)
    {
        $this->model = $entry;
    }
}
