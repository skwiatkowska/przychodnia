<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanelController extends Controller {

    public function mainSite ()
    {
        if (Auth::check()) {
            return View('panel');
        } else {
            return redirect('/login');
        }
    }
}