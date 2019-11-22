<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('pages.welcome');
    }
    public function about(){
        return view('pages.about');
    }
    public function backup(){
        $db_name = env('DB_DATABASE');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $host = env('DB_HOST');
        $path = 'public\database_backup';
        $filename = $db_name.\Carbon\Carbon::now()->toDateString().'.sql';
        exec('mysqldump -u'.$username.' -p'.$password.' '.$db_name.' > '.$filename);
        // $myfile = fopen("testfile.txt", "w")
        return view('home');
    }
}
