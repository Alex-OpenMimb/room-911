<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

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

    //Scope

    public function scopeGetAccesEmployye($query, $id){
        return $query->where('employee_id', $id);
    }

    public function scopeDateAccess($query, $dateFrom, $dateTo){
        return $query->whereDate('created_at', '>=', $dateFrom)
                    ->whereDate('created_at', '<=', $dateTo);
    }

    public function scopeUniqueDateAccess($query, $date){
        return $query->whereDate('created_at', $date);
    }

   //Accesors

   public function getAccessAttemptAttribute() {
    return Carbon::parse($this->created_at)->toFormattedDateString().' - '.Carbon::parse($this->created_at)->format('h:i:s A');
    }

    public function getFullCreatedAtAttribute() {
    return Carbon::parse($this->created_at)->toFormattedDateString().' - '.Carbon::parse($this->created_at)->format('h:i:s A');
    }

}
