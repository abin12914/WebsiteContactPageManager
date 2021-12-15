<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserProfile()
    {
        $a = 10;
        $b = 20;
        $sum = $a + $b;
        return $sum;
    }
}
