<?php
namespace App\Http\Controllers;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProfile()
    {
        $user = Auth::user();
        if ($user->isAdmin()) {
            return view('pages.admin.home');
        }
        
        return view('user');
    }
}