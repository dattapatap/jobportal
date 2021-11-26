<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Employee::all();

    	$emp = DB::table('employee')
    	->join('users', 'employee.user_id', '=', 'users.id')
    	//->join('countries', 'provinces.country_id', '=', 'countries.id')
    	->where('users.role_id',3)
    	->get(['employee.id','employee.first_name', 'employee.last_name', 'users.mobile', 'users.email', 'employee.dob','employee.gender', 'employee.registerd_date',]);
    	return $emp;

    }
}