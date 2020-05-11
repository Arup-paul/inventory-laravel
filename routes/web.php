<?php



Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

//category Routes here
Route::get('/add-category', 'categoryController@index')->name('add.category');
Route::post('/insert-category', 'categoryController@store');
Route::get('/all_category', 'categoryController@show')->name('all.category');
Route::get('/delete_category/{id}', 'categoryController@deleteCategory');


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
Route::get('/view_supplier/{id}', 'SupplierController@viewSuppliers');
Route::get('/delete_supplier/{id}', 'SupplierController@deleteSupplier');
Route::get('/edit_supplier/{id}', 'SupplierController@editSupplier');
Route::post('/update-supplier/{id}', 'SupplierController@updateSupplier');



//Salary Routes
Route::get('/add-advance_salary', 'SalaryController@addAdvanceSalary')->name('add.advance_salary');
Route::get('/all_advance_salary', 'SalaryController@showAdvanceSalary')->name('all.advance_salary');
Route::post('/insert_advance_salary', 'SalaryController@InsertAdvanceSalary');
Route::get('/delete_advance_salary/{id}', 'SalaryController@deleteAdvanceSalary');


//pay salary
Route::get('/pay_salary', 'SalaryController@Paysalary')->name('pay.salary');


//products route
Route::get('/add-product', 'ProductsController@index')->name('add.product');
Route::get('/all_product', 'ProductsController@show')->name('all.product');
Route::post('/insert-product', 'ProductsController@store');
Route::get('/md5(view_product)/{id}', 'ProductsController@viewProduct');
Route::get('/delete_product/{id}', 'ProductsController@deleteProduct');
Route::get('/edit_product/{id}', 'ProductsController@editProduct');
Route::post('/update-product/{id}', 'ProductsController@updateProduct');



//Expense route
Route::get('/add-expense', 'ExpenseController@index')->name('add.expense');
Route::get('/today-expense', 'ExpenseController@TodayExpense')->name('today.expense');
Route::post('/insert-expense', 'ExpenseController@store');
Route::get('/delete_expenses/{id}', 'ExpenseController@deleteExpense');
Route::get('/edit_expense/{id}', 'ExpenseController@editTodayExpense');
Route::post('/update-expense/{id}', 'ExpenseController@updateTodayExpense');
Route::get('/month-expense', 'ExpenseController@MonthExpense')->name('month.expense');



