<?php

namespace App\Exports;

use App\Entry;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    { $searchUser = request('user');
        $searchJob = request('job');
        $searchReference = request('reference');
        $searchOnyxId = request('OO_ID');
        $searchContractor = request('contractor');
        $searchJobType = request('job_type');
        $searchContact = request('contact');
        $searchJobStatus = request('job_status');
        $searchStatus = request('status');
        return   Entry::with('jobs','jobStatuses','users','statuses','approvals','companies')
            ->join('jobs','jobs.id', '=', 'entries.job_id')
            ->orwhereHas('jobs')
            ->where('job','like',"%{$searchJob}%")
            ->orWhere('jobs.job_type','like',"%{$searchJobType}%")
            ->join('users','users.id','=','entries.user_id')
            ->orWhereHas('users')
            ->where('users.id','like',"%$searchUser%")
            ->orWhere('users.reference','like',"%$searchReference%")
            ->orWhere('users.OO_id','like',"%$searchOnyxId%")

            ->join('approvals','approvals.id','=',"jobs.approval_id")
            ->orWhereHas('approvals')
            ->where('approvals.approval','like',"%$searchStatus%")

            ->join('job_statuses','job_statuses.id','=',"entries.job_status_id")
            ->orWhereHas('jobStatuses')
            ->where('job_statuses.job_status','like',"%$searchJobStatus%")
            ->join('companies','companies.id','=','jobs.contractor_id')
            ->orWhereHas('companies')
            ->where('companies.contractor','like',"%$searchContractor%")
            ->get();
    }
    public function headings(): array
    {
        return [
            'contractor_id',
            '',
            'user_id',
            'job_status_id',
            'created_at',
            'updated_at',
            'job',
            '',
            'job_id',
            'job_type',
            'start_date',
            'end_date',
            'first_name',
            'last_name',
            'reference',
            'OO_ID',
            'user_id',
            '',
            '',
            '',
            '',
            'approval',
            'job_status',
            'an printed',
            'printed date',
            'contractor',
        ];
    }
}
