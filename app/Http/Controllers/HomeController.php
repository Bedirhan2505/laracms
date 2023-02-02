<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function redirectUser(){
        if(auth()->user()->hasRole('admin')){
            return to_route('admin.dashboard');
        }
        if(auth()->user()->hasRole('user')){
            return to_route('user.dashboard');
        }
    }
}
