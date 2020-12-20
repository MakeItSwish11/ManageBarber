<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barber extends Model
{
    //
    use SoftDeletes;

    public function Customers(){
        return $this->hasMany(Customer::class, "barber_id", 'id');
    }
}
