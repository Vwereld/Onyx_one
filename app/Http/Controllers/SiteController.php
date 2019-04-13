<?php

namespace App\Http\Controllers;


class SiteController extends Controller
{
    protected $appr_rep;
    protected $comp_rep;
    protected $ent_rep;
    protected $job_rep;
    protected $job_st_rep;
    protected $stat_rep;
    protected $us_rep;
    protected $title;
    protected $template;
    protected $vars = [];

    public function __construct()
    {
    }
    protected function renderOutput(){
        return view($this->template)->with($this->vars);
    }
}
