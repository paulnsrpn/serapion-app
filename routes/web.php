
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
    dd (Response::json($userService->ListUser()));
});


