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
        $telefon= $request->input('phone');
        $data_ur= $request->input('data_urodzenia');

        $patient = new Patient();
        $user = new User();
        

        $user_id=$user->addUser($name, $email, $password, $user_type="patient",$status = "active");
        
        

        $isRegistered = $patient->addNewUser($user_id, $name, $surname, $email, $pesel, $adres,$telefon,$data_ur, $password);

            return redirect('login')->with('info', 'Konto zostało zarejestrowane');

        $errors = $user->getErrors();
        return redirect('/rejestracja')->with('errors', $errors);
    }
}