<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

use DB;

class UsersExport implements FromCollection, WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	$emp = DB::table('employee')
    	->join('users', 'employee.user_id', '=', 'users.id')
    	->where('users.role_id',3)
    	->get(['employee.id','employee.first_name', 'employee.last_name', 'users.mobile', 'users.email', 'employee.dob','employee.gender', 'employee.registerd_date', 'users.deleted_at',]);

        foreach($emp as $item){
            if($item->deleted_at == null ){
                $item->deleted_at = "NO";
            }else{
                $item->deleted_at = "YES";
            }
        }
        return $emp;

    }
    public function headings(): array
    {
        return[
          'Employee Id','Frst Name', 'Last Name', 'Mobile', 'Email', 'Date of Birth','Gender', 'Registerd Date', 'Is Deleted Profile',
          ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->getDelegate()->getStyle('A1:I1')
                                ->getFont()
                                ->setBold(true);
            },
        ];
    }
}
