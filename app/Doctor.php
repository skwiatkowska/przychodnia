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
    private $attampt = false;


    public function login($email, $password){

        if (Auth::attempt(['email' => $email, 'password' => $password])){
            return true;
        } else {
                $user->errors[] = 'Nieprawidlowy email lekarza lub haslo';
                $this->attempt = true;
            return false;
        }

    }
    public function tried(){
        return $this->attempt;
    }

    public function getErrors()
    {
        return $this->errors;
    }

}
