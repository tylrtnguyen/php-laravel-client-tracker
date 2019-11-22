<?php


namespace App\Helpers;
use Request;
use App\LogActivity as LogActivityModel;
use Carbon\Carbon;


class LogActivity
{

    public static function addToLog($user_info,$module,$user_activity)
    {
    	$log = [];
    	$log['user_info'] = $user_info;
    	$log['module_name'] = $module;
        $log['action'] = $user_activity;
        $log['date_time'] = Carbon::now();
    	$log['IP'] = Request::ip();
    	LogActivityModel::create($log);
    }


    public static function logActivityLists()
    {
    	return LogActivityModel::latest()->get();
    }


}
