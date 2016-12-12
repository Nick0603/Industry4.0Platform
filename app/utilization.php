<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utilization extends Model
{
    public function machine()
    {
        return $this->belongsTo(Company::class);
    }

    public function remark()
    {
    	return $this->hasOne(remark::class);
    }

}
