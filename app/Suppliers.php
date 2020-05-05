<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model {
    //

    protected $fillable = [
        'name', 'email', 'phone', 'address', 'type', 'photo', 'shop', 'account_holder', 'account_number', 'bank_name', 'bank_branch', 'city',
    ];
}
