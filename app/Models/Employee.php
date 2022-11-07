<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'employees';

    protected $fillable = [
        'employee_document',
        'first_name',
        'last_name',
        'department_id',
        'status'
    ];


    //Relationship

    public function accessRecord() {
        return $this->hasMany(AccessRecord::class);  
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }
}
