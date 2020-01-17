<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
* Kontroler autoryzacji.
*/
class AuthController extends Controller
{
	
	/**
	*Funkcja odpowiada za wyświetlenie formularza logowania.
	*@return view Widok formularza logowania
	*/
    public function formView()
    {
        if (Auth::check()) {
            return authenticated();
        } else {
            return View('login-form');
        }
    }

	/**
	*Funkcja odpowiada za przesłanie danych logowania.
	*@return void Przy logowaniu zakończonym sukcesem - przekierowuje na
	odpowiedni panel w zależności od typu użytkownika, w przypadku niepowodzenia zostaje
	na stronie logowania.
	*/
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $type= $request->input('user_type');

        $user = new User();
        //wywołujemy funkcję szukającą statusu pacjenta o podanym adresie email
        $st_usr = $user->isActive($email); 

        if ($user->login($email, $password,$type,$status="active")) {
            if($type=='doctor'){
                return redirect()->intended('panel_lekarza') -> with('info','Zalogowano poprawnie');
            }elseif ($type=='reception'){
                return redirect()->intended('recepcja') -> with('info','Zalogowano poprawnie');

            }else{
            return redirect()->intended('') -> with('info','Zalogowano poprawnie');
            }
    }

        $errors = $user->getErrors();
        return redirect('/login')->with('errors', $errors);

    }

	/**
	*Funkcja odpowiada za wylogowywanie.
	*@return void Przekierowuje na stronę startową.
	*/
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('info','Wylogowano');
    }

}