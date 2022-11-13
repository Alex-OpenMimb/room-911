<?php

namespace App\Imports;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class Import implements ToModel, WithHeadingRow, WithValidation
{
    use Importable;
    /** 
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    private $department;

    public function __construct()
    {
        $this->department = Department::pluck('id','name');
    }

    public function model(array $row)
    {
        return new Employee([
            'first_name'        => $row['first_name'],
            'last_name'         => $row['last_name'],
            'employee_document' => $row['employee_document'],
            'department_id'     => $this->department[$row['department']],
        ]);
    }

   

    public function rules():Array
    {
        return [
            'first_name'                => 'bail|required|min:3|max:20|string',
            'last_name'                 => 'bail|required|string|min:3|max:50',
            'employee_document'         => 'bail|required|numeric|digits_between:7,12|unique',
            'department'                => 'bail|required',
        ];
    }
    

    // public function rules():array
    // {
    //     return [
    //         'first_name'                 =>  Rule::in(['required','string']),
    //         'last_name'                  =>  Rule::in(['required','string']),
    //         'employee_document'          =>  Rule::in(['required','numeric', 'unique']),
    //         'department'                 =>  Rule::in(['required','numeric']),
    
    //     ];
    // }

    
}
