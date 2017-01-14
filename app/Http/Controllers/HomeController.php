<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index($name = 'Guest')
    {
        return "welcome to our site $name !!!";
    }

    public function hello($name, $age)
    {
        return "hello $name i $age";
    }
}