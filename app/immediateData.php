<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class immediateData extends Model
{
    public function machines()
    {
    	return $this->belongsTo(machine::class);
    }
}
