<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function formView()
    {
        if (Auth::check()) {
            return authenticated();
        } else {
            return View('login-form');
        }
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');


        $user = new User();
        //wywołujemy funkcję szukającą typu pacjenta o podanym adresie email
        $type_usr = $user->getUsrType($email); 

        if ($user->login($email, $password)) {
            if($type_usr=='doctor'){
                return redirect()->intended('panel-lekarza') -> with('info','zalogowano poprawnie');
            }elseif ($type_usr=='reception'){
                return redirect()->intended('recepcja') -> with('info','zalogowano poprawnie');

            }else{
            return redirect()->intended('') -> with('info','zalogowano poprawnie');
            }
    }

        $errors = $user->getErrors();
        return redirect('/login')->with('errors', $errors);

    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    protected function authenticated() {

        if (auth()->user()->isDoctor()) {
            return View('recepcja');
        } 
        else if (auth()->user()->isAdmin()) {
            return View('panel_lekarza');
           } else {
               return View('/');
               } 
   }

}