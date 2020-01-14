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

/**
* Klasa odpowiedzialna za użytkownika.
*/

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    public $timestamps = false;
    private $errors = [];
    private $attemptp = false;
    private $attemptd = false;
	
    /**
     * Atrybuty, które można przypisać.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_type'
    ];

    /**
     * Atrybuty, które są ukryte.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	/**
	*Funkcja dodaje nowego użytkownika do bazy.
	*@param string $name Imię użytkownika
	*@param string $email Email użytkownika
	*@param string $password Hasło użytkownika
	*@param string $user_type Typ użytkownika: patient, doctor lub reception
	*@param string $status Status użytkownika: active lub inactive
	*@return mixed Id użytkownika jeśli udało się dodać pacjenta do bazy. 
	 FALSE jeśli niepoprawnie wypełniono pola.	
	*/
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
    
	/**
     * Funkcja sprawdza, czy użytkownik jest adminem.
     *
     * @return boolean
     */
    public function isAdmin() {
         return $this->user_type == self::ADMIN_TYPE;
     }
    
	/**
     * Funkcja sprawdza, czy użytkownik jest lekarzem.
     *
     * @return boolean
     */
    public function isDoctor() {
         return $this->user_type == self::DOCTOR_TYPE;
    } 
	
	/**
     * Funkcja sprawdza, czy użytkownik ma aktywny status.
     * @param string $email Email użytkownika
     * @return string Zwraca aktualny status użytkownika: active lub inactive
     */
    public function isActive($email) {
        $status = User::where('email', $email)->first()['status'];
        return $status;
    } 

	/**
     * Funkcja dezaktywuje użytkownika.
     * @param integer $id Id użytkownika
     * @return boolean TRUE jeśli pomyślnie dezaktywowano użytkownika.
     */
    public function deactivateUser($id){
    $user = User::where('id',$id)->first();
    $user->status = "inactive";
    $user->save();
    return true;
    }

	/**
     * Funkcja aktywuje użytkownika.
     * @param integer $id Id użytkownika
     * @return boolean TRUE jeśli pomyślnie dezaktywowano użytkownika.
     */
    public function activateUser($id){
    $user = User::where('id',$id)->first();
    $user->status = "active";
    $user->save();
    return true;
    }
 
	/**
     * Funkcja zwraca typ użytkownika.
     * @param string $email Email użytkownika
     * @return string Zwraca typ użytkownika: patient, doctor lub reception
     */
    public function getUsrType($email) {
        $type_data = User::where('email', $email)->first()['user_type'];
        return $type_data;
    } 

	/**
     * Funkcja odpowiada za logowanie użytkownika.
     * @param string $email Email użytkownika
	 * @param string $password Hasło użytkownika
	 * @param string $type Typ użytkownika
	 * @param string $status Status użytkownika
     * @return boolean TRUE jeśli udało się poprawnie zalogować. 
	   FALSE jeśli błędnie wypełniono pola.
     */
    public function login($email, $password, $type, $status){
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

	/**
	*Funkcja zwraca błędy.
	*/
     public function getErrors()
    {
        return $this->errors;
    }
	
	/**
	*Funkcja zmienia dane użytkownika.
	*@param integer $patientId Id danego użytkownika
	*@param string $name Imię użytkownika - jeśli ma pozostać niezmienione: Null
	*@param string $email Email użytkownika - jeśli ma pozostać niezmienione: Null
	*@return boolean TRUE jeśli udało się zmienić dane użytkownika.
	*/
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
	
	/**
	*Funkcja zmienia hasło użytkownika.
	*@param integer $patientId Id danego użytkownika
	*@param string $old Stare hasło użytkownika 
	*@param string $new Nowe hasło użytkownika 
	*@param string $new2 Powtórzone nowe hasło użytkownika 
	*@return boolean TRUE jeśli udało się zmienić hasło użytkownika.
	 FALSE jeśli wystąpiły błędy.
	*/
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
    /**
	*Funkcja zmienia hasło użytkownika - pacjenta.
	*@param integer $patientId Id danego użytkownika
	*@param string $new Nowe hasło użytkownika 
	*@param string $new2 Powtórzone nowe hasło użytkownika 
	*@return boolean TRUE jeśli udało się zmienić hasło użytkownika.
	 FALSE jeśli wystąpiły błędy.
	*/
    public function ForceNewPassword($patientId,$new,$new2)
    {
        $user = User::where('id',$patientId)->first();
        $patient = Patient::where('id_usr',$patientId)->first();
        if($new==$new2){
            $user->remember_token=null;
            $user->password=bcrypt($new);
            $user->save();
            $patient->password=bcrypt($new);
            $patient->save();
            return true;
        }
        
        return false;
    }
}
