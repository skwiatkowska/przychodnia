<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\User;
use Illuminate\Foundation\Auth\Doctor as Authenticatable;

class Doctor extends Model
{
    protected $table = 'doctors';
    public $timestamps = false;
    private $errors = [];

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

    public function getErrors()
    {
        return $this->errors;
    }

}
