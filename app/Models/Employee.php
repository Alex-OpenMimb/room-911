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
        'first_name',
        'last_name',
        'employee_document',
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

    public function scopeEmployeeDocument($query, $document){
        return $query->where('employee_document', $document);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('first_name','like', '%'.$search.'%')
                        ->orWhere('last_name','like', '%'.$search.'%')
                        ->orWhere('id','=', $search)
                        ->orWhere('employee_document','like', $search.'%')
                        ->orWhere('status','like', '%'.$search.'%');
    }

    public function scopeDepartment($query, $id){
        return $query->where('department_id', $id);
    }

    public function scopeDateAccess($query, $dateFrom, $dateTo){
        return $query->whereHas('accessRecord', function($q) use ($dateFrom, $dateTo){
            $q->whereDate('created_at', '>=', $dateFrom);
            $q->whereDate('created_at', '<=', $dateTo);
            $q->where('access', 'YES');
        });
    }

    public function scopeUniqueDateAccess($query, $date){
        return $query->whereHas('accessRecord', function($q) use ($date){
            $q->whereDate('created_at', $date);
            $q->where('access', 'YES');
        });
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
