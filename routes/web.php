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
Route::post('/update-employee/{id}', 'EmployeeController@updateEmployee');



//customer Route
Route::get('/add-customer', 'CustomersController@index')->name('add.customer');
Route::get('/all_customer', 'CustomersController@show')->name('all.customer');
Route::post('/insert-customer', 'CustomersController@store');
Route::get('/view_customer/{id}', 'CustomersController@viewCustomers');
Route::get('/delete_customer/{id}', 'CustomersController@deleteCustomers');
Route::get('/edit_customer/{id}', 'CustomersController@editCustomers');
Route::post('/update-customer/{id}', 'CustomersController@updateCustomer');



//Supplier Routes
Route::get('/add-supplier', 'SupplierController@index')->name('add.supplier');
Route::get('/all_supplier', 'SupplierController@show')->name('all.supplier');
Route::post('/insert-supplier', 'SupplierController@store');
Route::get('/view_customer/{id}', 'CustomersController@viewCustomers');


