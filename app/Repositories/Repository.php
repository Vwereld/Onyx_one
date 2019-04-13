<?php
/**
 * Created by PhpStorm.
 * User: Vitaly
 * Date: 08/04/2019
 * Time: 13:56
 */
namespace App\Repositories;


abstract class Repository {
    protected $model = FALSE;

    public function get($select='*'){
        $builder = $this->model->select($select);
        return $builder->get();
    }
}
