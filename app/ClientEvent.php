<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientEvent extends Model
{
    //Table name
    protected $table = "client_events";
    //Primary key
    public $primaryKey = 'id';

    public function client(){
        return $this->belongsTo('App\Client');
    }
}
