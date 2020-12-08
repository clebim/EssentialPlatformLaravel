<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    function user() {
        return $this->hasMany(User::class , 'privilege_id', 'id');
    }
}
