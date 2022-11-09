<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'departments';

    protected $fillable = [
        'name',
        'status'
    ];

    //Relationship

    public function employees() {
        return $this->hasMany(Employee::class);
    }

    const NAME = [
        'Audit department',
        'Packing department',
        'Production department',
        'Quality department',
    ];


}
