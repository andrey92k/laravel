<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return redirect(route('staff.index'));
});

Route::get('staff', 'StaffController@index')->name('staff.index');

Route::get('staff/{department}', 'StaffController@showByDepartment')->name('staff.department');

Route::get('import', 'ImportController@index')->name('import.index');

Route::post('import', 'ImportController@run')->name('import.run');

// Route::get('/error',function(){
//   abort(404);
// });
