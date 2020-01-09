<?php

namespace App;
use App\Doctor;
use App\Patient;
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


    public function addUser($name, $email, $password,$user_type,$status)
    {
        $data = [
            $name,
            $email,
            $password,
            $user_type,
            $status
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
        $user->status=$status;
        $user->save();

        
        $user_id = $user->id;

        return $user_id;
    }
  
    const ADMIN_TYPE = "reception";
    const DOCTOR_TYPE = "doctor";
    
    public function isAdmin() {
         return $this->user_type == self::ADMIN_TYPE;
     }
    
    public function isDoctor() {
         return $this->user_type == self::DOCTOR_TYPE;
    } 
    public function isActive($email) {
        $status = User::where('email', $email)->first()['status'];
        return $status;
   } 

   public function deactivateUser($id){
    $user = User::where('id',$id)->first();
    $user->status = "inactive";
    $user->save();
    return true;
}

   public function activateUser($id){
    $user = User::where('id',$id)->first();
    $user->status = "active";
    $user->save();
    return true;
}

    public function getUsrType($email) {
        $type_data = User::where('email', $email)->first()['user_type'];
        return $type_data;
   } 

    public function login($email, $password, $type,$status){
        if (empty($email)) {
            $this->errors[] = 'Pole E-mail nie moze być puste!';
            return false;
        }
        if (empty($password)) {
            $this->errors[] = 'Pole Hasło nie moze być puste!';
            return false;
        }
        if (empty($type)) {
            $this->errors[] = 'Zaznacz rodzaj użytkownika!';
            return false;
        }
        if (Auth::attempt(['email' => $email, 'password' => $password, 'user_type'=>$type,'status'=>$status])){
            return true;
        } else {
                $this->errors[] = 'Nieprawidłowy email lub hasło';
            return false;
        }
        
    }

     public function getErrors()
    {
        return $this->errors;
    }

    public function changeData($patientId,$name, $email)
    {
        $user = User::where('id',$patientId)->first();
        if ($name) {
            $user->name = $name;
        }
        if ($email) {
            $user->email = $email;
        }
        $user->save();
        return true;
    }
    public function changePassword($patientId,$old,$new,$new2)
    {
        $user = User::where('id',$patientId)->first();
        $patient = Patient::where('id_usr',$patientId)->first();
        $password=$user->password;
        if (Hash::check($old,$password) ){
            if($new==$new2){
                $user->remember_token=null;
                $user->password=bcrypt($new);
                $user->save();
                $patient->password=bcrypt($new);
                $patient->save();
                return true;
            }
        }
        
        return false;
    }
}
