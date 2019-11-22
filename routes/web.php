<?php



Route::get('/', 'PagesController@index');
Route::get('/about','PagesController@about');
Route::resource('client','ClientsController');
Route::resource('notification','NotificationsController');
Route::resource('event','EventsController');
Route::resource('user','UsersController');
Route::get('/log','LogsController@index');
Route::get('/database',function(){
    return view('systems.database');
});
Auth::routes();
Route::get('/register','PagesController@index');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user',function(){
    if(Auth::user()->position != 'Manager'){
        return redirect('/home')->with('error','You are not permitted to see this page');
    }
    else{
        $controller = new App\Http\Controllers\UsersController;
        return $controller->index();
    }
});
Route::get('/backup/database','PagesController@backup');
