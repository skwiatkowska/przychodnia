<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;


/**
 * Class Pacjent
 * @package App
 *
 * @property string imie
 * @property string nazwisko
 * @property string email
 * @property string pesel
 * @property string adres
 */
class Patient extends Model
{
    protected $table = 'patients';
    public $timestamps = false;
    private $errors = [];

    public function addNewUser($name, $surname, $email, $pesel, $adres, $password)
    {
        $data = [
            $name,
            $surname,
            $email,
            $pesel,
            $adres,
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
        $patient->imie = $name;
        $patient->nazwisko = $surname;
        $patient->email = $email;
        $patient->pesel = $pesel;
        $patient->adres = $adres;
        $patient->password = Hash::make($password);
        $patient->save();


        return true;
    }

    public function login($email, $password){

        if (empty($email)) {
            $this->errors[] = 'Pole Email nie moze byc puste!';
            return false;
        }
        if (empty($password)) {
            $this->errors[] = 'Pole Haslo nie moze byc puste!';
            return false;
        }

        if (Auth::attempt(['email' => $email, 'password' => $password])){
            return true;
        } else {
                $this->errors[] = 'Nieprawidlowy email lub haslo';
            return false;
        }

    }

    public function getErrors()
    {
        return $this->errors;
    }


}
