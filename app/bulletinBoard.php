<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bulletinBoard extends Model
{

    public function company()
    {
    	return $this->belongTo(company::class);
    }
}
