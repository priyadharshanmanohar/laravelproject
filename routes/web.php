
<?php
use Illuminate\Http\Request;
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
    $links = \App\Links::all();

    return view('welcome', ['links' => $links]);
});
Route::post('/store', 'ImportController@store');
Route::get('/display', 'ImportController@display');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('ajax',function() {
    return view('message');
 });
 Route::post('/getmsg','AjaxController@index');