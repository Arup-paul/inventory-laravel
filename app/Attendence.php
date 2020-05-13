<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    //
    protected $fillable = [
        'employee_id', 'attendence_date', 'attendence_year','attendence_month', 'attendence','edit_date'
    ];
}
