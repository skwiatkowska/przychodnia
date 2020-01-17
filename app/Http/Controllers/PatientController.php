<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Patient;
use App\User;

/**
* Kontroler panelu pacjenta.
*/
class PatientController extends Controller {

	/**
	*Funkcja odpowiada za wyświetlenie panelu pacjenta.
	*@return view Widok panelu pacjenta
	*/
    public function mainSite ()
    {
        if (Auth::check()) {
            return View('pacjent-panel/panel');
        } else {
            return redirect('/login');
        }
    }

	/**
	*Funkcja odpowiada za wyświetlenie panelu ustawień.
	*@return view Widok panelu ustawień
	*/
    public function settings()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        return view('pacjent-panel/panel-ustawienia');
    }

	/**
	*Funkcja odpowiada za wyświetlenie danych pacjenta.
	*@return view Widok danych pacjenta
	*/
    public function patientInfo()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $patient = new Patient();
        $patientId = Auth::id();
        
        $allData= $patient->getData($patientId);

        return View('pacjent-panel/panel-dane', ['data' => $allData]);
    }
	
	/**
	*Funkcja odpowiada za przesłanie danych do zmiany ustawień
	*@return void W przypadku udanej zmiany danych przekierowuje na stronę danych.
	*/
    public function changeData(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        $name = $request->input('imie');
        $surname = $request->input('nazwisko');
        $email = $request->input('email');
        $pesel = $request->input('pesel');
        $adres = $request->input('adres');
        $telefon= $request->input('phone');
        $data_ur= $request->input('data_urodzenia');

        $patientId = Auth::id();

        $patient = Patient::where('id_usr',$patientId)->first();
        $user = User::where('id',$patientId)->first();

        $user->changeData($patientId,$name, $email);
        $patient->changeData($patientId,$name,$surname,$email,$pesel,$adres,$telefon,$data_ur);


        return redirect('panel/dane')->with('info', 'Dane zostały zmienione');
    }

    /**
	*Funkcja odpowiada za przesłanie danych do zmiany hasła
	*@return void W przypadku udanej zmiany danych przekierowuje na stronę danych.
	*/
    public function changePassword(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        $old = $request->input('haslo');
        $new = $request->input('haslo1');
        $new2 = $request->input('haslo2');

        $patientId = Auth::id();
        $user = User::where('id',$patientId)->first();
        $user->changePassword($patientId,$old,$new,$new2);
       
        return redirect('panel/dane')->with('info', 'Hasło zostało zmienione');
    }

	/**
	*Funkcja odpowiada za dezaktywację konta.
	*@return void W przypadku pomyślnej dezaktywacji wylogowuje użytkownika.
	*/
    public function disableAccount(){
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        $patientId = Auth::id();

        $user = User::where('id',$patientId)->first();
        $user->deactivateUser($patientId);
        if ($user = false) {
            abort(404);
            return;
        }
        return redirect('/logout')->with('info','Wybrane konto zostało zdezaktywowane');
    }

}