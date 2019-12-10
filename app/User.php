<?php

namespace App;
use App\Doctor;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    public $timestamps = false;
    private $errors = [];
    private $attemptp = false;
    private $attemptd = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function addUser($name, $email, $password,$user_type)
    {
        $data = [
            $name,
            $email,
            $password,
            $user_type
        ];

        // Sprawdz czy pola nie sa puste
        foreach ($data as $input) {
            if (empty($input)) {

                $this->errors[] = 'Wszystkie pola sa obowiazkowe';

                return false;
            }
        }


        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->user_type = $user_type;
        $user->save();
        return true;
    }
  
    const ADMIN_TYPE = 'reception';
    const DOCTOR_TYPE = 'doctor';
    
    public function isAdmin() {
         return $this->user_type === self::ADMIN_TYPE;
     }
    
    public function isDoctor() {
         return $this->user_type === self::DOCTOR_TYPE;
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
