<?php

namespace App\Exports;

use App\Models\Recruiter;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use DB;

class RecruiterExport implements FromCollection, WithHeadings
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
    	->get(['recruiters.id','recruiters.company_name','recruiters.contact_person', 'recruiters.proffession','users.email','users.mobile',
        'recruiters.location', 'recruiters.twiter', 'recruiters.linkedin','recruiters.website','users.status', 'recruiters.created_at',]);
    	return $recr;
    }
    public function headings(): array
    {
        return [
            'Recruiter Id','Recruiter Company Name','Contact Person','Proffession','Email','Mobile','Location','twiter','linkedin','Website','Status','Created At',
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->getDelegate()->getStyle('A1:l1')
                                ->getFont()
                                ->setBold(true);
            },
        ];
    }
}
