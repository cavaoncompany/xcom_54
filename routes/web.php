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
    $content = App\Models\Xcomcontent::all();
    // $content = json_decode($contentJson);
    return view('home', compact('content'));
});

Route::get('/thankyou', function(){
    return view('thankyou');
})->name('thankyou');


Route::get('/sendemail', 'sendEmailController@index');
Route::post('/sendemail/send', 'sendEmailController@sendEmail')->name('send-email');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});