<?php



Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

//employer Routes here
Route::get('/add-employee', 'EmployeeController@index')->name('add.employee');
Route::post('/insert-employee', 'EmployeeController@store');
Route::get('/all_employee', 'EmployeeController@show')->name('all.employee');
Route::get('/view_employee/{id}', 'EmployeeController@viewEmployee');
Route::get('/delete_employee/{id}', 'EmployeeController@deleteEmployee');
Route::get('/edit_employee/{id}', 'EmployeeController@editEmployee');

