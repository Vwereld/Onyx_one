<?php

namespace App\Http\Controllers;

use App\Entry;
use App\Exports\UsersExport;
use App\Repositories\ApprovalsRepository;
use App\Repositories\CompaniesRepository;
use App\Repositories\EntriesRepository;
use App\Repositories\JobRepository;
use App\Repositories\JobStatusRepository;
use App\Repositories\StatusRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Excel;

class SearchController extends SiteController
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
    public function search(Request $request){

        $entries = Entry::with(['jobs','jobStatuses','users','statuses','approvals'])->get();
        $searchUser = request('user');
        $searchJob = request('job');
        $searchReference = request('reference');
        $searchOnyxId = request('OO_ID');
        $searchContractor = request('contractor');
        $searchJobType = request('job_type');
        $searchContact = request('contact');
        $searchJobStatus = request('job_status');
        $searchStatus = request('status');
        $ads = null;

//        work snippet

        if (request()->has('user') or request()->has('reference') or request()->has('OO_ID')) {
            $q = Entry::with('users', 'statuses', 'approvals', 'companies', 'jobs')
                ->join('users', 'users.id', '=', 'entries.user_id')
                ->orWhereHas('users')
                ->where('users.id', 'like', "%$searchUser%")->get();
        }
        else $q =null;
        if (request()->has('user') or request()->has('reference') or request()->has('OO_ID')) {
            $q1a = Entry::with('users', 'statuses', 'approvals', 'companies', 'jobs')
                ->join('users', 'users.id', '=', 'entries.user_id')
                ->orWhereHas('users')
                ->where('users.reference', 'like', "%$searchReference%")->get();
        }
        else $q1a =null;
        if (request()->has('user') or request()->has('reference') or request()->has('OO_ID')) {
            $q2a = Entry::with('users', 'statuses', 'approvals', 'companies', 'jobs')
                ->join('users', 'users.id', '=', 'entries.user_id')
                ->orWhereHas('users')
                ->where('users.OO_id', 'like', "%$searchOnyxId%")->get();
        }
        else $q2a =null;
        if (request()->has('job') or request()->has('job_type') or request()->has('user') or request()->has('reference') or request()->has('OO_ID') or request()->has('job_status') or request()->has('status')) {
            $q1 = Entry::with('jobs', 'jobStatuses', 'users', 'statuses', 'approvals', 'companies')
                ->join('jobs', 'jobs.id', '=', 'entries.job_id')
                ->orwhereHas('jobs')
                ->where('job', 'like', "%{$searchJob}%")
                ->get();

        }
        if (request()->has('job_type')) {
            $q2 = Entry::with('jobs', 'jobStatuses')
                ->join('jobs', 'jobs.id', '=', 'entries.job_id')
                ->orwhereHas('jobs')
                ->where('jobs.job_type', 'like', "%{$searchJobType}%")
                ->get();
        }
        else $q2 =null;
        if (request()->has('job_status')) {
            $q3 = Entry::with('jobs', 'jobStatuses')
                ->join('job_statuses', 'job_statuses.id', '=', "entries.job_status_id")
                ->orWhereHas('jobStatuses')
                ->where('job_statuses.job_status', 'like', "%$searchJobStatus%")
                ->get();
        }
        else $q3 = null;

        if (request()->has('status')) {
            $q4 = Entry::with('jobs', 'jobStatuses', 'users', 'statuses', 'approvals', 'companies')
                ->join('jobs', 'jobs.id', '=', 'entries.job_id')
                ->join('approvals', 'approvals.id', '=', "jobs.approval_id")
                ->orWhereHas('approvals')
                ->where('approvals.approval', 'like', "%$searchStatus%")
                ->get();
        }
        else $q4 = null;
        if (request()->has('contractor')) {
            $q5 = Entry::with('jobs', 'jobStatuses', 'statuses', 'companies')
                ->join('jobs', 'jobs.id', '=', 'entries.job_id')
                ->join('companies', 'companies.id', '=', 'jobs.contractor_id')
                ->orWhereHas('companies')
                ->where('companies.contractor', 'like', "%$searchContractor%")
                ->get();
        }
        else $q5 =null;
        $searchResults = ['q'=>$q,'q1a'=>$q1a,'q2a'=>$q2a,'q1'=>$q1,'q2'=>$q2,'q3'=>$q3,'q4'=>$q4,'q5'=>$q5];

//    end work snippet


// shows all results from collection
//            $ads = Entry::with('jobs','jobStatuses','users','statuses','approvals','companies')
//                ->join('jobs','jobs.id', '=', 'entries.job_id')
//                ->orwhereHas('jobs')
//                ->where('job','like',"%{$searchJob}%")
//                ->orWhere('jobs.job_type','like',"%{$searchJobType}%")
//                ->join('users','users.id','=','entries.user_id')
//                ->orWhereHas('users')
//                ->where('users.id','like',"%$searchUser%")
//                ->orWhere('users.reference','like',"%$searchReference%")
//                ->orWhere('users.OO_id','like',"%$searchOnyxId%")
//
//                ->join('approvals','approvals.id','=',"jobs.approval_id")
//                ->orWhereHas('approvals')
//                ->where('approvals.approval','like',"%$searchStatus%")

//                ->join('job_statuses','job_statuses.id','=',"entries.job_status_id")
//                ->orWhereHas('jobStatuses')
//                ->where('job_statuses.job_status','like',"%$searchJobStatus%")
//                ->join('companies','companies.id','=','jobs.contractor_id')
//                ->orWhereHas('companies')
//                ->where('companies.contractor','like',"%$searchContractor%")
//                ->get();
//
//      end

        $content = view('search')->with(['searchResults'=>$searchResults,'entries'=>$entries,'q'=>$q,'q1a'=>$q1a,'q2a'=>$q2a,'q1'=>$q1,'q2'=>$q2,'q3'=>$q3,'q4'=>$q4,'q5'=>$q5])->render();

        $this->vars = Arr::add($this->vars,'content',$content);

        return $this->renderOutput();
    }

    public function export(){
        return Excel::download(new UsersExport(), 'exports.xlsx');
    }
}
