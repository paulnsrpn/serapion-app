<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    public function index(UserService $userService){
        return $userService->ListUser();
    }

    public function first(UserService $userService){
        return collect($userService->ListUser())->first();
    }

    public function show(UserService $userService, $id){
        $user=collect($userService->ListUser())->filter(function ($item) use ($id){
            return $item['id'] == $id;
        })->first();
        return $user;
    }
    

}
