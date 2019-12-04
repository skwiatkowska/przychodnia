<?php
namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function formView()
    {
        if (Auth::check()) {
            return redirect('/panel');
        } else {
            return View('login-form');
        }
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $patient = new Patient();
        if ($patient->login($email, $password)) {
            return redirect()->intended('/panel');
        }

        $errors = $patient->getErrors();
        return redirect('/login')->with('errors', $errors);

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');

    }

}