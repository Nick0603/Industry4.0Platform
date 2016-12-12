<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    public function utilization()
    {
        return $this->belongsTo(utilization::class);
    }
}