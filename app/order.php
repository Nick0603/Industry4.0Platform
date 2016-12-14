<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function utilization()
    {
        return $this->hasMany(utilization::class);
    }

    public function company()
    {
    	return $this->belongTo(company::class);
    }
}
