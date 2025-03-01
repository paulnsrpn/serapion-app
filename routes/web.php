
<?php

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

//service provider
Route::get('test-container', function (Request $request){
    $input = $request->input(('key'));
    return $input;
});


Route::get('/test-provider', function(UserService $UserService){
    return $UserService->ListUser();
});

Route::get('/test-users', [UserController::class, 'index']);

Route::get('/test-facade', function (UserService $userService){
    return $userService->ListUser();
});

Route::get('post/{post}/comment/{comment}', function (string $postId, string $comment) {
    return "Post ID: " . $postId ."- Comment: " . $comment;
});

Route::get('/post/{id}' , function (string $id){
    return $id;
}) ->where('id', '[0-9]+');

Route::get('/search/{search}' , function (string $search){
    return $search;
}) ->where('search', '.*'); 

Route::get('/test/route' , function (){
    return route('test-route');
}) ->name('test-route');

Route::middleware(['user-middleware'])->group(function () {
    Route::get('route-middleware-group/first', function (Request $request){
        echo 'first';
    });

    Route::get('route-middleware-group/second', function (Request $request){
        echo 'second';
    });
    
});


Route::controller(UserController::class)->group(function (){
    Route::get('/user', 'index');
    Route::get('/users/first', 'first');
    Route::get('/user/{id}', 'show');
});


Route::get('/token', function (Request $request){
    return view('token');
});

Route::post('/token', function (Request $request){
    return $request->all();
});