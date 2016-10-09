<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    public function company()
    {
        return $this->belongsTo(company::class);
    }

    public function position()
    {
    	return $this->hasOne(position::class);
    }
}
