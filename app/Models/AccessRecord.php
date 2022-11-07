<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccessRecord extends Model
{

    use HasFactory, SoftDeletes;

    protected $table = 'access_records';


    protected $fillable = [
        'name',
        'employee_id',
        'employee_document',
        'access'
    ];

    //Relationship

    public function employee() {
        return $this->belongsTo(Employee::class);
    }



}
