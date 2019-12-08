<?php

namespace App;
use App\Patient;
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


    public function addUser($name, $email, $password,$user_type="pacjent")
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
        $user->password = Hash::make($password);
        $user->user_type = $user_type;
        $user->save();
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
        $patient = new Patient();
        if ($patient->login($email, $password)) {
            return redirect()->intended('/panel') ;
        }
        $this->attempt = $patient -> tried();

        if ($this->attemptp){
            $doctor = new Doctor(); 
        
            
            if ($doctor->login($email, $password)) {
                return redirect()->intended('/') -> with('info','witamy, doktorze');
           
            } 
            $this->attemptd = $doctor ->tried();    
        }
    
        $this->errors= $patient -> getErrors();
        
    }
     public function getErrors()
    {
        return $this->errors;
    }
}
