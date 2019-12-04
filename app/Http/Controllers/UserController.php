<?php
namespace App\Http\Controllers;

class UserController extends Controller
{
    public function showProfile()
    {
        return view('user');
    }
}