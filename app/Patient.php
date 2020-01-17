<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\User;
use Illuminate\Foundation\Auth\Patient as Authenticatable;

/**
* Klasa odpowiedzialna za pacjenta.
*/

class Patient extends Model
{
    protected $table = 'patients';
        //private $attempt = false;

    public $timestamps = false;
    private $errors = [];

	/**
	*Funkcja dodaje nowego pacjenta do bazy.
	*@param integer $id_usr Id danego pacjenta
	*@param string $name Imię pacjenta
	*@param string $surname Nazwisko pacjenta
	*@param string $email Email pacjenta
	*@param string $pesel Pesel pacjenta
	*@param string $adres Adres pacjenta
	*@param string $telefon Telefon pacjenta
	*@param date $data_urodzenia Data urodzenia pacjenta
	*@param string $password Hasło pacjenta
	*@return boolean TRUE jeśli udało się dodać pacjenta do bazy. 
	FALSE jeśli email pacjenta istnieje już w bazie, bądź niepoprawnie wypełniono pola.	
	*/
    public function addNewUser($id_usr, $name, $surname, $email, $pesel, $adres,$telefon,$data_urodzenia, $password)
    {
        $data = [
            $id_usr,
            $name,
            $surname,
            $email,
            $pesel,
            $adres,
            $telefon,
            $data_urodzenia,
            $password
        ];

        // Sprawdz czy pola nie sa puste
        foreach ($data as $input) {
            if (empty($input)) {

                $this->errors[] = 'Wszystkie pola sa obowiazkowe';

                return false;
            }
        }

        $isRegistered = Patient::where('email', $email)->first();
        if ($isRegistered != null) {
            // Konto jest juz zarejestrowane, podaj inny.
            $this->errors[] = 'Konto jest juz zarejestrowane na podany email.';
            return false;
        }

        $patient = new Patient();
        $patient->id_usr= $id_usr;
        $patient->imie = $name;
        $patient->nazwisko = $surname;
        $patient->email = $email;
        $patient->pesel = $pesel;
        $patient->telefon=$telefon;
        $patient->data_urodzenia=$data_urodzenia;
        $patient->adres = $adres;
        $patient->password = bcrypt($password);
        $patient->save();
   


        return true;
    }
    
	/**
	*Funkcja zwraca błędy.
	*/
    public function getErrors()
    {
        return $this->errors;
    }

	/**
	*Funkcja zwraca wszystkie dane pacjenta.
	*@param integer $patientId Id danego pacjenta
	*@return array Wszystkie dane pacjenta
	*/
    public function getData($patientId)
    {     
        $data_all = Patient::where('id_usr', $patientId)->get();
        return $data_all[0];
    }
	
	/**
	*Funkcja zmienia dane pacjenta.
	*@param integer $patientId Id danego pacjenta
	*@param string $surname Nazwisko pacjenta - jeśli ma pozostać niezmienione: Null
	*@param string $email Email pacjenta - jeśli ma pozostać niezmienione: Null
	*@param string $pesel Pesel pacjenta - jeśli ma pozostać niezmienione: Null
	*@param string $adres Adres pacjenta - jeśli ma pozostać niezmienione: Null
	*@param string $telefon Telefon pacjenta - jeśli ma pozostać niezmienione: Null
	*@param date $data_urodzenia Data urodzenia pacjenta - jeśli ma pozostać niezmienione: Null
	*@return boolean TRUE jeśli udało się zmienić dane pacjenta.
	*/
    public function changeData($patientId,$name,$surname,$email,$pesel,$adres,$telefon,$data_ur)
    {     
        $patient = Patient::where('id_usr',$patientId)->first();

        if ($name) {
            $patient->imie = $name;
        }
        if ($surname) {
            $patient->nazwisko = $surname;
        }
        if ($email) {
            $patient->email = $email;
        }
        if ($pesel) {
            $patient->pesel = $pesel;
        }
        if ($adres) {
            $patient->adres = $adres;
        }
        if ($telefon) {
            $patient->telefon = $telefon;
        }
        if ($data_ur) {
            $patient->data_urodzenia = $data_ur;
        }
        $patient->save();
        return true;
    }
	
	/**
	*Funkcja zwraca id użytkownika danego pacjenta.
	*@param integer $patientId Id danego pacjenta
	*@return integer Id użytkownika danego pacjenta.
	*/
    public function getUserId($patientId)
    {     
        $id_usr = Patient::where('id', $patientId)->first()['id_usr'];  ;
        
        return $id_usr;
    }

    
}