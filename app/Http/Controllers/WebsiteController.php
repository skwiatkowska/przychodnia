<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class WebsiteController extends Controller
{
    public function mainSite()
    {
        return View('home');
    }

    public function rodo()
    {
        return View('rodo');
    }

    public function clinicList()
    {
        return View('poradnie');
    }
}
