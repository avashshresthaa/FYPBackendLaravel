<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    // initialize the table
    protected $table = 'appointments'; 
    protected $fillable = [
        'name',
        'age',
        'gender',
        'phone',
        'datetime',
        'doctorName',
        'hospitalName',
        'describeProblem',
        //'payment',
    ];
}
