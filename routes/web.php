<?php



Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/home', function () {
//     // Only verified users may enter...

// })->middleware('verified');

Route::group(['middleware'=>'verified'],function(){
    Route::get('/inbox', function(){
        echo "inbox";
    })->name('inbox'); 


    Route::get('/calender', function(){
        echo "calender";
    })->name('calender');
});


