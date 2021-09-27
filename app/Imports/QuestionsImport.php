<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class QuestionsImport implements ToCollection, WithHeadingRow
{
	public $data ;

    public function collection(Collection $collection)
    {	
        foreach ($collection as $row) 
        {
        	if($row->filter()->isNotEmpty()){
        		// if($row->ignoreEmpty()){
          	  	 		$this->data[] = $row->toArray();
          	  	 // }
          	 }
        }
    }

    public function headingRow(): int
    {
        return 1;
    }

   
}
