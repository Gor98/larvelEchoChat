<?php
use App\User;
use App\Message;

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
return redirect('/chat-room');
});



Auth::routes();


Route::get('/chat-room', function () {

    return view('chatroom');
})->middleware('auth');

Route::get('/messages', function () {

return json_encode(Message::with('user')->get());
})->middleware('auth');

Route::post('/message', function () {

    Auth::user()->messages()->create([
        'message'=> request()->get('message')
    ]);

    return ['status'=> 200];
})->middleware('auth');

