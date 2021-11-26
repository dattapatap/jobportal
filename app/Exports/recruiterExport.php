<?php

namespace App\Exports;

use App\Models\Recruiter;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class RecruiterExport implements FromCollection 
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Recruiter::all();
        $recr = DB::table('recruiters')
    	->join('users', 'recruiters.user_id', '=', 'users.id')
    	->where('users.role_id',2)
    	//->where('users.status',"Active")
    	->get(['recruiters.id','recruiters.company_name','recruiters.contact_person', 'recruiters.proffession','users.email','users.mobile', 'recruiters.location', 'recruiters.twiter', 'recruiters.linkedin','recruiters.website','users.status', 'recruiters.created_at',]);
    	return $recr;
    }
}