<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function events(){
        return $this->hasMany('App\ClientEvent');
    }
}
