<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utilization extends Model
{
    public function machine()
    {
        return $this->belongsTo(machine::class);
    }

    public function remark()
    {
    	return $this->hasOne(remark::class);
    }

    public function order()
    {
    	return $this->belongsTo(order::class);
    }
}
