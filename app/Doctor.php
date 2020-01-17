<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\User;
use Illuminate\Foundation\Auth\Doctor as Authenticatable;

/**
* Klasa odpowiedzialna za lekarza.
*
*/

class Doctor extends Model
{
    protected $table = 'doctors';
    public $timestamps = false;
    private $errors = [];

	/**
	*Funkcja dodaje nowego lekarza do bazy.
	*@param integer $user_id Id danego lekarza
	*@param string $title Tytuł lekarza
	*@param string $name Imię lekarza
	*@param string $surname Nazwisko lekarza
	*@param string $specialization Specjalizacja lekarza
	*@param string $email Email lekarza
	*@param integer $phone Telefon lekarza
	*@param integer $gabinet Numer gabbinetu lekarza
	*@param string $password Hasło lekarza
	*@return boolean TRUE jeśli udało się dodać lekarza do bazy. 
	FALSE jeśli email lekarza istnieje już w bazie, bądź niepoprawnie wypełniono pola.	
	*/
    public function addNewUser($user_id,$title,$name, $surname, $specialization,$email,$phone,$gabinet,$password)
    {
        $data = [
            $user_id,
            $title,
            $name, 
            $surname, 
            $specialization,
            $email,
            $phone,
            $gabinet,
            $password
        ];

        // Sprawdz czy pola nie sa puste
        foreach ($data as $input) {
            if (empty($input)) {
                $this->errors[] = 'Wszystkie pola sa obowiazkowe';
                return false;
            }
        }

        $isRegistered = Doctor::where('email', $email)->first();
        if ($isRegistered != null) {
            // Konto jest juz zarejestrowane, podaj inny.
            $this->errors[] = 'Konto jest juz zarejestrowane na podany email.';
            return false;
        }

        $doctor = new Doctor();
        $doctor->id_usr = $user_id;
        $doctor->imie = $name;
        $doctor->specjalizacja = $specialization;
        $doctor->tytul = $title;
        $doctor->gabinet=$gabinet;
        $doctor->nazwisko = $surname;
        $doctor->email = $email;
        $doctor->telefon=$phone;
        $doctor->password = bcrypt($password);
        $doctor->save();
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
	*Funkcja zwraca wszystkie dane lekarza.
	*@param integer $doctorId Id danego lekarza
	*@return array Wszystkie dane lekarza
	*/
    public function getData($doctorId)
    {     
        $data_all = Doctor::where('id_usr', $doctorId)->get();
        return $data_all[0];
    }

    /**
	*Funkcja zmienia dane lekarza.
    *@param integer $id Id danego lekarza
    *@param string $title Tytuł Naukowy lekarza - jeśli ma pozostać niezmienione: Null
    *@param string $name Imie lekarza - jeśli ma pozostać niezmienione: Null
	*@param string $surname Nazwisko lekarza - jeśli ma pozostać niezmienione: Null
	*@param string $email Email lekarza - jeśli ma pozostać niezmienione: Null
    *@param string $telefon Telefon lekarza - jeśli ma pozostać niezmienione: Null
    *@param string $specialization Specjalizacja lekarza - jeśli ma pozostać niezmienione: Null
    *@param string $room Gabinet lekarza - jeśli ma pozostać niezmienione: Null
	*@return boolean TRUE jeśli udało się zmienić dane lekarza.
	*/
    public function changeData($id,$title,$name,$surname,$email,$telefon,$specialization,$room)
    {     
        $doctor = Doctor::where('id',$id)->first();
        if ($title) {
            $doctor->tytul = $title;
        }
        if ($name) {
            $doctor->imie = $name;
        }
        if ($surname) {
            $doctor->nazwisko = $surname;
        }
        if ($email) {
            $doctor->email = $email;
        }
        if ($telefon) {
            $doctor->telefon = $telefon;
        }
        if ($specialization) {
            $doctor->specjalizacja = $specialization;
        }
        if ($room) {
            $doctor->gabinet = $room;
        }
        
        
        
        $doctor->save();
        return true;
    }


}
