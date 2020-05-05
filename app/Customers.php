<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    //
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'shop_name', 'photo', 'account_holder', 'account_number', 'bank_name','bank_branch','city'
    ];
}
