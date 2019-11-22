<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    protected $fillable=[
        'user_info','module_name','action','date_time','IP'
    ];
}
