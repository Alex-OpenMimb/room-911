<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;


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

    //Scope

    public function scopeHandleEmployee($query)
    {
        return $query->where('id', '>', 0);
    }

    public function scopeDocumenNumber($query, $document){
        return $query->where('employee_document', $document);
    }

    //Accesors

    public function getFullNameAttribute() {
        return $this->first_name.' '.$this->last_name;
    }

    public function getFirstNameAttribute($value) {
        return ucfirst($value);
    }

    public function getLastNameAttribute($value) {
        return ucfirst($value);
    }

    public function getLastAccessAttribute() 
    {
        $access = AccessRecord::where('employee_id', $this->id)->where('access', 'YES')->get()->last();
        if ($access) {
            return Carbon::parse($access->created_at)->toFormattedDateString().' - '.Carbon::parse($access->created_at)->format('h:i:s A');
        }
        return 'no register';
    }


    public function getLastAccessTotalAttribute()
     {
        return AccessRecord::where('employee_id', $this->id)->where('access', 'YES')->count();
     }
}
