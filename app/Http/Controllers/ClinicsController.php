<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class ClinicsController extends Controller
{
    public function mainSite()
    {
        return View('poradnie');
    }

}