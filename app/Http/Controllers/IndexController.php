<?php

namespace App\Http\Controllers;

use App\Entry;
use App\Repositories\ApprovalsRepository;
use App\Repositories\CompaniesRepository;
use App\Repositories\EntriesRepository;
use App\Repositories\JobRepository;
use App\Repositories\JobStatusRepository;
use App\Repositories\StatusRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;


class IndexController extends SiteController
{
    public function __construct(ApprovalsRepository $appr_rep, CompaniesRepository $comp_rep, EntriesRepository $ent_rep, JobRepository $job_rep, JobStatusRepository $job_st_rep, StatusRepository $stat_rep, UserRepository $us_rep)
    {
        parent::__construct();
        $this->appr_rep = $appr_rep;
        $this->comp_rep = $comp_rep;
        $this->ent_rep = $ent_rep;
        $this->job_rep = $job_rep;
        $this->job_st_rep = $job_st_rep;
        $this->stat_rep = $stat_rep;
        $this->us_rep = $us_rep;
        $this->template = 'index';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entries = Entry::with(['jobs','jobStatuses','users','statuses','approvals'])->get();
        $content = view('add_content')->with('entries',$entries)->render();
        $this->vars = Arr::add($this->vars, 'content', $content);
        return $this->renderOutput();
    }
    protected function getApprovals()
    {
        $approvals = $this->appr_rep->get();
        return $approvals;
    }
    protected function getCompanies()
    {
        $companies = $this->comp_rep->get();
        return $companies;
    }
    protected function getEntries()
    {
        $entries = $this->ent_rep->get();
        return $entries;
    }
    protected function getJobs()
    {
        $jobs = $this->job_rep->get();
        return $jobs;
    }
    protected function getJobStatuses()
    {
        $jobStatuses = $this->job_st_rep->get();
        return $jobStatuses;
    }
    protected function getStatuses()
    {
        $statuses = $this->stat_rep->get();
        return $statuses;
    }
    protected function getUsers()
    {
        $users = $this->us_rep->get();
        return $users;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
