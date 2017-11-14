<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



//USER
Route::auth();
Route::get('admin', 'Homecontroller@index');
Route::get('/', 'Homecontroller@index');
Route::get('admin/nota', 'notaController@index');
Route::get('admin/nota/search','searchController@nota');
Route::get('admin/nota/filter','filterController@nota');
Route::get('admin/nota/{id}', 'notaController@show' );
Route::get('admin/customer/nota/schedule/edit/{id}', 'notaController@edit' );
Route::post('admin/customer/nota/schedule/update/{id}', 'notaController@reschedule' );
Route::post('admin/customer/nota/update/{id}', 'notaController@update' );
Route::post('admin/customer/nota/delete/{id}', 'notaController@destroy' );



Route::get('admin/customer','customerController@index');
Route::get('jadwal','reportController@jadwal');
Route::get('admin/customer/course/add','customerController@kursus');
Route::get('admin/customer/test/add','customerController@test');
Route::post('admin/customer/store', 'notaController@store');
Route::get('admin/customer/search','searchController@customer');
Route::get('admin/customer/filter','filterController@customer');
Route::get('admin/customer/test', 'testController@customer');
Route::post('admin/customer/retur/{id}', 'customerController@setRetur');
Route::get('admin/customer/{id}/profile','customerController@show');
Route::get('admin/customer/edit/{id}', 'customerController@edit');
Route::post('admin/customer/update/{id}', 'customerController@update');
Route::get('admin/customer/delete/{id}', 'customerController@destroy');



//AJAX
Route::get('mahasiswa/{id}', 'customerController@ceknrp');
Route::get('customer/{id}','courseController@getCustomer');
Route::get('service/{id}','levelController@getService');
Route::get('level/{id}','customerController@getlevel');
Route::get('date/{id}','customerController@getDate');
Route::get('pick/{id}','courseController@getPick');


//PRINT
Route::get('admin/service/test/{id}/schedule/berita/print','printController@printberitatest');
Route::get('admin/service/test/{id}/schedule/absen/print','printController@printabsentest');
Route::get('admin/course/{id}/class/{kp}/attendance/print','printController@printabsen');
Route::get('admin/course/{id}/class/{kp}/berita/print','printController@printberita');
Route::get('admin/print/excel','printController@excel');
Route::get('admin/nota/{id}/print', 'printController@printnota' );
Route::get('admin/report/finance/bulan/{bid}/tahun/{tid}/print','printController@printkeuangan');

//USER
Route::get('admin/user', 'userController@index');
Route::get('admin/user/profile', 'userController@profile');
Route::get('admin/user/{id}/profile','userController@show');
Route::get('admin/user/add', 'userController@add');
Route::post('admin/user/store', 'userController@store');
Route::get('admin/user/{id}/status', 'userController@status');
Route::get('admin/user/edit/{id}', 'userController@edit');
Route::post('admin/user/update/{id}', 'userController@update');
Route::get('admin/user/delete/{id}', 'userController@destroy');


//LAYANAN
Route::get('admin/service/add', 'serviceController@add');
Route::get('admin/service/level/add', 'levelController@create');
Route::post('admin/service/level/store', 'levelController@store');
Route::get('admin/service/level/{id}/edit', 'levelController@edit');
Route::get('admin/service/level/{id}/customer', 'languageController@show');
Route::post('admin/service/level/update', 'levelController@update');
Route::post('admin/service/level/delete/{id}', 'levelController@destroy');
Route::get('admin/service/language', 'languageController@index');
Route::get('admin/service/preparation', 'preparationController@index');
Route::get('admin/service/test', 'testController@index');
Route::post('admin/service/store', 'serviceController@store');
Route::get('admin/service/edit/{id}', 'serviceController@edit');
Route::post('admin/service/update/{id}', 'serviceController@update');
Route::post('admin/service/delete/{id}', 'serviceController@destroy');


//ROOM
Route::get('admin/room', 'roomController@index');
Route::get('admin/room/schedule/{id}', 'roomController@show');
Route::get('admin/room/{id}/schedule/add', 'roomController@addschedule');
Route::get('admin/room/{id}/schedule/edit', 'roomController@showedit');
Route::post('admin/room/schedule/store', 'roomController@storeschedule');
Route::get('admin/room/add', 'roomController@create');
Route::post('admin/room/store', 'roomController@store');
Route::get('admin/room/{id}/edit', 'roomController@edit');
Route::post('admin/room/update', 'roomController@update');
Route::post('admin/room/delete/{id}', 'roomController@destroy');



//KURSUS
Route::get('admin/course/periode', 'courseController@show');
Route::get('admin/course', 'courseController@index');
Route::get('admin/course/add', 'courseController@add');
Route::get('admin/course/{id}/class/{kp}', 'courseController@customer');
Route::get('admin/course/{lid}/class/{kp}/schedule/{sid}', 'courseController@detail');
Route::get('admin/course/{id}/class/{kp}/grade/add', 'gradeController@create');
Route::get('admin/course/{id}/class/{kp}/grade/edit', 'gradeController@edit');
//Route::get('admin/course/{id}/class/{kp}/grade/edit', 'gradeController@edit');
Route::get('admin/course//grade/update', 'gradeController@update');
Route::post('admin/course/grade/store', 'gradeController@store');
Route::post('admin/course/store', 'courseController@store');
Route::post('admin/course/delete/{id}/class/{kp}', 'courseController@destroy');
Route::post('admin/course/delete/customer/{nid}', 'courseController@hapuspeserta');
Route::get('admin/course/level/{id}', 'serviceController@getLevel');
//Route::get('admin/course/{id}/attendance/{kp}', 'courseController@setattendance');
Route::get('admin/course/{id}/class/{kp}/addcustomer', 'courseController@addcustomer');
Route::post('admin/course/updatecustomer', 'courseController@updatecustomer');

//ATTENDANCE
Route::get('admin/course/{id}/class/{kp}/attendance/add', 'attendanceController@create');
Route::post('admin/course/attendance/store', 'attendanceController@store');
Route::get('admin/course/attendance/setabsencust/{id}/{a}', 'attendanceController@setabsencust');
Route::get('admin/nota/setbook/{id}', 'notaController@setbook');
Route::post('admin/course/attendance/setabsen', 'attendanceController@setabsen');
Route::get('admin/course/attendance/setall/{sid}/{a}', 'attendanceController@setall');

//TEST
Route::get('admin/service/test/schedule/add', 'testController@add');
Route::get('admin/service/test/{id}/schedule', 'testController@showSchedule');
Route::get('admin/service/test/{id}/schedule/all', 'testController@showallSchedule');
Route::get('admin/service/test/{lid}/schedule/{sid}/customer', 'testController@showCustomer');
Route::post('admin/service/test/schedule/store', 'testController@store');
Route::get('admin/service/test/schedule/edit/{id}', 'scheduleController@edit');
Route::post('admin/service/test/schedule/update', 'scheduleController@update');
Route::get('admin/service/test/schedule/delete/{id}', 'scheduleController@delete');

//SHCEDULE
Route::get('admin/schedule/{id}', 'scheduleController@index');
Route::get('admin/schedule/room', 'scheduleController@index');
Route::get('admin/schedule/test', 'scheduleController@index');
Route::get('admin/room/schedule/add', 'roomController@addschedule');
Route::get('admin/schedule/course', 'scheduleController@index');
Route::post('admin/schedule/store', 'scheduleController@store');

//REPORT
Route::get('admin/report/periode/{id}', 'reportController@show');
Route::get('admin/report/customer/{id}/add', 'reportController@create');
Route::get('admin/report/finance', 'reportController@finance');
Route::get('admin/report/attendance', 'reportController@attendance');
Route::get('admin/report/finance/filter','filterController@finance');
Route::get('admin/report/course', 'reportController@course');
Route::post('admin/report/store', 'reportController@store');
Route::get('admin/course/{lid}/report/kelas/{kp}/periode/{pid}/print', 'printController@printolaporankursus');
Route::get('admin/course/{lid}/report/kelas/{kp}/periode/{pid}', 'courseController@customer');

//Route::get('admin/course/{lid}/report/kelas/{kp}/periode/', 'reportController@show');

//PERIODE
Route::get('admin/periode', 'periodeController@index');
Route::get('admin/periode/add', 'periodeController@create');
Route::post('admin/periode/store', 'periodeController@store');
Route::get('admin/periode/{id}/edit', 'periodeController@edit');
Route::post('admin/periode/update/{id}', 'periodeController@update');
Route::get('admin/periode/{id}/activation', 'periodeController@status');
Route::post('admin/periode/{id}/destroy', 'periodeController@destroy');


Route::get('admin/customer/{id}/schedule/pick', 'customerController@getpick');
Route::get('admin/customer/{id}/schedule/edit', 'customerController@editSchedule');
Route::post('admin/customer/{cid}/pick/delete/{pid}', 'scheduleController@delpick');
Route::get('admin/schedule/pick/add', 'scheduleController@pick');
Route::post('admin/schedule/pick/set', 'scheduleController@pickset');
Route::post('admin/schedule/pick/store', 'scheduleController@pickstore');
Route::post('admin/schedule/pick/delete/{id}', 'scheduleController@delpick');



//QUESTION
Route::get('admin/question', 'questionController@index');
Route::get('admin/question/add', 'questionController@create');
Route::post('admin/question/store', 'questionController@store');
Route::get('admin/question/{id}/edit', 'questionController@edit');
Route::post('admin/question/update/{id}', 'questionController@update');
Route::get('admin/question/{id}/activation', 'questionController@status');
Route::post('admin/question/{id}/destroy', 'questionController@destroy');

//RESET
/*Route::get('password/email', 'Auth\Passwordcontroller@getEmail');
Route::post('password/email', 'Auth\Passwordcontroller@postEmail');*/





//POST
Route::get('/admin/post', 'PostController@index');
Route::get('/admin/post/add', 'PostController@add');
Route::post('/admin/post/store', 'PostController@store');
Route::get('/admin/post/edit/{id}', 'PostController@edit');
Route::post('/admin/post/update/{id}', 'PostController@update');
Route::post('/admin/post/delete/{id}', 'PostController@destroy');

//PRODUCT
Route::get('/admin/product', 'productController@product');
Route::get('/admin/product/add', 'productController@add');
Route::post('/admin/product/store', 'productController@store');
Route::get('/admin/product/edit/{id}', 'productController@edit');
Route::post('/admin/product/update/{id}', 'productController@update');
Route::post('/admin/product/delete/{id}', 'productController@destroy');


//FRONT
Route::get('/', 'FrontController@index');
Route::get('/abouts', 'FrontController@abouts');
Route::get('/services', 'FrontController@services');
Route::get('/contacts', 'FrontController@contacts');
Route::get('/news', 'FrontController@news');
Route::get('/news/{id}', 'FrontController@show');
Route::get('/services/{id}', 'FrontController@showKursus');
