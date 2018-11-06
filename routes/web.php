<?php
use App\User;
use App\Message;
use App\Events\MessagePost;

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





Route::get('/chat-room', function () {

    return view('chatroom');
})->middleware('auth');

Route::get('/messages', function () {

return json_encode(Message::with('user')->get());
})->middleware('auth');

Route::post('/message', function () {

    $user = Auth::user();

    $message = $user->messages()->create([
        'message'=> request()->get('message')
    ]);

    //Announce that new Message has been posted
    MessagePost::dispatch($message, $user);
//    broadcast(new MessagePost($message, $user))->toOthers();


    return ['status'=> 200];
});

Auth::routes();

Route::get('/home', function () {
    return redirect('/chat-room');
});

