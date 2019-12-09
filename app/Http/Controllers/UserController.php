<?php
namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

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