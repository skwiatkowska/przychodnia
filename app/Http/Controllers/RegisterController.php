<?php
namespace App\Http\Controllers;

use App\Patient;
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
        $isRegistered = $patient->addNewUser($name, $surname, $email, $pesel, $adres = "nie podano", $password);

        if ($isRegistered) {
            return redirect('/')->with('info', 'Konto zostało zarejstrowane, możesz zalogować się w oknie logowania');
        }

        $errors = $patient->getErrors();
        return redirect('/rejestracja')->with('errors', $errors);
    }


}