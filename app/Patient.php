<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\User;
use Illuminate\Foundation\Auth\Patient as Authenticatable;


class Patient extends Model
{
    protected $table = 'patients';
        //private $attempt = false;

    public $timestamps = false;
    private $errors = [];

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
    
    public function getErrors()
    {
        return $this->errors;
    }


    public function getData($patientId)
    {     
        $data_all = Patient::where('id_usr', $patientId)->get();
        return $data_all[0];
    }
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


    
}