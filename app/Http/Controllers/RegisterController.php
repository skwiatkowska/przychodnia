<?php
namespace App\Http\Controllers;

use App\Patient;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{

    public function formView()
    {
        return View('rejestracja');
    }

    public function register(Request $request)
    {
        $name = $request->input('imie');
        $surname = $request->input('nazwisko');
        $email = $request->input('email');
        $pesel = $request->input('pesel');
        $adres = $request->input('adres');
        $password = $request->input('haslo');

        $patient = new Patient();
        $user = new User();


       $isRegistered = $patient->addNewUser($name, $surname, $email, $pesel, $adres, $password);
        $user->addUser($name, $email, $password, $user_type="patient");

            return redirect('login')->with('info', 'Konto zostało zarejestrowane, możesz sie teraz zalogować:');

        $errors = $user->getErrors();
        return redirect('/rejestracja')->with('errors', $errors);
    }


}