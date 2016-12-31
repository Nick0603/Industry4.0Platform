<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model 
{
    public function users()
    {
    	return $this->hasMany(User::class);
    }

    public function machines()
    {
    	return $this->hasMany(machine::class);
    }
    public function order()
    {
    	return $this->hasMany(order::class);
    }

    public function bulletinBoards()
    {
        return $this->hasMany(bulletinBoard::class);
    }
}
