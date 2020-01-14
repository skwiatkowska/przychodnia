<?php
namespace App\Http\Controllers;

use App\Patient;
use App\Doctor;
use App\Deadline;
use App\User;
use App\Visit;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
* Kontroler panelu recepcji.
*/
class ReceptionController extends Controller {

	/**
	*Funkcja odpowiada za wyświetlenie panelu recepcji.
	*@return view Widok panelu pacjenta
	*/
    public function mainSite()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        return View('recepcja-panel/recepcja');
    }

	/**
	*Funkcja odpowiada za wyświetlenie formularza rejestracji pacjenta.
	*@return view Widok formularza rejestracji pacjenta
	*/
    public function patientRegisterFormView()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        return View('/recepcja-panel/dodaj-pacjenta');
    }

	/**
	*Funkcja odpowiada za dezaktywację konta pacjenta.
	*@return void W przypadku pomyślnej dezaktywacji przekierowuje na stronę pacjenta
	z odpowiednim komunikatem.
	*/
    public function disablePatientAccount($id){
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        //$user = User::deactivateUser($id);
        $patient = Patient::where('id',$id)->first();
        $id_usr=$patient->getUserId($id);
        $user=User::where('id',$id_usr)->first();
        $user->deactivateUser($id_usr);
 
        if ($user = false) {
            abort(404);
            return;
        }
        return redirect('/recepcja/pacjent/'.$id)->with('info','Konto zostało zdezaktywowane.');
    }

	/**
	*Funkcja odpowiada za aktywację konta pacjenta.
	*@return void W przypadku pomyślnej aktywacji przekierowuje na stronę pacjenta
	z odpowiednim komunikatem.
	*/
    public function enablePatientAccount($id){
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
       // $user = User::activateUser($id);
       $patient = Patient::where('id',$id)->first();
       $id_usr=$patient->getUserId($id);
       $user=User::where('id',$id_usr)->first();
       $user->activateUser($id_usr);

        if ($user = false) {
            abort(404);
            return;
        }
        return redirect('/recepcja/pacjent/'.$id)->with('info','Konto zostało aktywowane.');
    }

	/**
	*Funkcja odpowiada za przesłanie danych rejestracji pacjenta.
	*@return void Przy rejestracji zakończonej sukcesem - przekierowuje na
	listę pacjentów, w przypadku niepowodzenia zostaje na stronie rejestracji.
	*/
    public function patientRegister(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        $name = $request->input('imie');
        $surname = $request->input('nazwisko');
        $email = $request->input('email');
        $pesel = $request->input('pesel');
        $adres = $request->input('adres');
        $password = $request->input('haslo');
        $telefon= $request->input('phone');
        $data_ur= $request->input('data_urodzenia');

        $patient = new Patient();
        $user = new User();


       
        $usr_id=$user->addUser($name, $email, $password, $user_type="patient", $status="active");

            return redirect('recepcja/lista_pacjentow')->with('info', 'Konto zostało zarejestrowane');
        $isRegistered = $patient->addNewUser($usr_id,$name, $surname, $email, $pesel, $adres, $telefon, $data_ur, $password);
        $errors = $user->getErrors();
        return redirect('recepcja/dodaj_pacjenta')->with('errors', $errors);
    }

	/**
	*Funkcja odpowiada za wyświetlenie formularza rejestracji lekarza.
	*@return view Widok formularza rejestracji lekarza
	*/
    public function doctorRegisterFormView()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        return View('recepcja-panel/dodaj-lekarza');
    }

	/**
	*Funkcja odpowiada za przesłanie danych rejestracji lekarza.
	*@return void Przy rejestracji zakończonej sukcesem - przekierowuje na
	listę lekarzy, w przypadku niepowodzenia zostaje na stronie rejestracji.
	*/
    public function doctorRegister(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        $title = $request->input('tytul');
        $name = $request->input('imie');
        $surname = $request->input('nazwisko');
        $specialization= $request->input('specjalizacja');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $gabinet = $request->input('gabinet');
        $password = $request->input('haslo');

        $doctor = new Doctor();
        $user = new User();

        $user_id =$user->addUser($name, $email, $password, $user_type="doctor", $status = "active");
        $isRegistered = $doctor->addNewUser($user_id,$title,$name, $surname, $specialization,$email,$phone,$gabinet,$password);

        if ($isRegistered)  {  return redirect('recepcja/lista_lekarzy')->with('info', 'Konto zostało zarejestrowane');
}
        $errors = $doctor->getErrors();
        return redirect('recepcja/dodaj_lekarza')->with('errors', $errors);
    }

	/**
	*Funkcja odpowiada za wyświetlenie listy lekarzy.
	*@return view Widok listy lekarzy
	*/
    public function doctorsList()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        $doctors = Doctor::orderBy('nazwisko','asc')->get();;
        return View('recepcja-panel/lista-lekarzy', ['doctors' => $doctors]);
    }

	/**
	*Funkcja odpowiada za wyświetlenie panelu wizyt.
	*@return view Widok panelu wizyt
	*/
    public function doctorsListForVisits()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        $doctors = Doctor::orderBy('nazwisko','asc')->get();
 
        return View('recepcja-panel/wizyty-start', ['doctors' => $doctors]);
    }

	/**
	*????Funkcja odpowiada za wyświetlenie listy lekarzy wraz z wizytami.
	**@param integer $id Id lekarza
	*@return view Widok listy lekarzy z wizytami
	*/
    public function doctorsListAndVisits($id)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        $doctors = Doctor::orderBy('nazwisko','asc')->get();
        $visits = Deadline::findDoctorAllDeadlines($id);
        $doctorData= Visit::findAllDoctorData($id);


        return View('recepcja-panel/wizyty', ['doctors' => $doctors, 'doctorData' => $doctorData, 'doctorVisits' => $visits]);
    }

	/**
	*Funkcja odpowiada za wyświetlenie panelu nowej wizyty.
	*@return view Widok panelu nowej wizyty
	*/
    public function doctorsListForAPatient()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        $doctors = Doctor::orderBy('nazwisko','asc')->get();;
        return View('recepcja-panel/nowa-wizyta', ['doctors' => $doctors]);
    }

	/**
	*???Funkcja odpowiada za wyświetlenie możliwych terminów nowej wizyty.
	*@param integer $id Id pacjenta
	*@param integer $doctor_id Id lekarza
	*@return view Widok wolnych terminów
	*/
    public function doctorsDeadlinesForAPatient($id,$doctor_id)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        $doctorsDeadlines = Deadline::findDoctorFreeDeadlines($doctor_id);

        if ($doctorsDeadlines==false) {
            abort(404);
            return;
        }
        return View('recepcja-panel/nowa-wizyta-terminy', ['doctorsDeadlines' => $doctorsDeadlines]);
    }

	/**
	*Funkcja odpowiada za wyświetlenie wolnych terminów danego lekarza.
	*@param integer $id Id lekarza
	*@return view Widok wolnych terminów
	*/
    public function doctorsDeadlines($id)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        $doctorsDeadlines = Deadline::findDoctorFreeDeadlines($id);

        if ($doctorsDeadlines==false) {
            abort(404);
            return;
        }

        return View('recepcja-panel/lekarz', ['doctorsDeadlines' => $doctorsDeadlines]);
    }

	/**
	*Funkcja odpowiada za wyświetlenie listy pacjentów.
	*@return view Widok listy pacjentów
	*/
     public function patientsList()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        $patients = Patient::orderBy('nazwisko','asc')->get();;
        return View('recepcja-panel/lista-pacjentow', ['patients' => $patients]);
    }

	/**
	*Funkcja odpowiada za wyświetlenie danych danego pacjenta.
	*@param integer $id Id pacjenta
	*@return view Widok danych pacjenta
	*/
    public function patientData($id)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        $patientData= Visit::findAllPatientData($id);
        $id_user= Patient::where('id',$id)->first()['id_usr'];
        $status= User::where('id',$id_user)->first()['status'];
        $arr1 = array('status' => $status);
        $patientData['pacjent'] = $patientData['pacjent'] + $arr1;
        if ($patientData==false) {
            abort(404);
            return;
        }

        return View('recepcja-panel/pacjent', ['patientData' => $patientData]);
    }

	/**
	*Funkcja odpowiada za wyświetlenie wszystkich wizyt
	*@return view Widok wizyt
	*/
    public function allVisits()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        $visit = new Visit();
        $visits = $visit->getAllVisits();
        return View('recepcja-panel/wizyty', ['visits' => $visits]);
    }

	/**
	*Funkcja odpowiada za wyświetlenie panelu ustawień pacjenta.
	*@param integer $id Id pacjenta
	*@return view Widok panelu ustawień pacjenta
	*/
    public function patientSettings($id)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        $patientData= Visit::findAllPatientData($id);

        if ($patientData==false) {
            abort(404);
            return;
        }
        return view('recepcja-panel/pacjent-ustawienia', ['patientData' => $patientData]);
    }

	/**
	*Funkcja odpowiada za wyświetlenie panelu ustawień lekarza.
	*@param integer $id Id lekarza
	*@return view Widok panelu ustawień lekarza
	*/
    public function doctorSettings($id)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        $doctorData= Visit::findAllDoctorData($id);

        if ($doctorData==false) {
            abort(404);
            return;
        }
        return view('recepcja-panel/lekarz-ustawienia', ['doctorData' => $doctorData]);
    }

	/**
	*Funkcja odpowiada za przesłanie danych umówienia wizyty
	*@return void Przy umówieniu wizyty zakończonym sukcesem - przekierowuje na
	stronę pacjenta, w przypadku niepowodzenia powraca na stronę terminów danego lekarza.
	*/
    public function addVisit(Request $request,$id,$id_lekarza)
    {

        $patientId = $id;
        $doctorId =$id_lekarza;
       // $doctorId = $request->query('id_lekarza');
        //$doctorId = $id_lekarza;
        //                                <input type="hidden" name="id_lekarza" value="{{$doctorsDeadlines['lekarz']['id']}}"/>

        $date = $request->query('data');
        $hour = $request->query('godzina');
        $patient_usr = Patient::where('id',$patientId)->first()['id_usr'];
        $visit = new Visit();
        $isVisit = $visit->addVisit($patient_usr, $doctorId, $date, $hour,"","");

        if ($isVisit) {
            return redirect('/recepcja/pacjent/'.$patientId)->with('info', 'Wizyta została poprawnie zarezerwowana.');
        }else{return redirect('/recepcja/pacjent/'.$patientId)->with('info', 'ERROR'.$patientId);

        }

        $errors = $visit->getErrors();
        return redirect('/terminy/'.$doctorId)->with('errors', $errors);

    }
	
	/**
	*Funkcja odpowiada za przesłanie danych odwołania wizyty
	*@return void Przy odwołania wizyty zakończonego sukcesem - przekierowuje na
	stronę pacjenta.
	*/
    public function deleteVisit(Request $request){
        $patientId = $request->input('id_pacjenta');
        $visitId = $request->input('id_wizyty');

        Visit::where('id', $visitId)->delete();
         return redirect('/recepcja/pacjent/'.$patientId)->with('info', 'Wizyta została odwołana.');
    }

	/**
	*Funkcja odpowiada za pwyświetlenie danych danego lekarza
	*@param integer $id Id lekarza
	*@return view Widok danych lekarza
	*/
    public function doctorData($id)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        } 
        $doctorData= Visit::findAllDoctorData($id);
        $id_user= Doctor::where('id',$id)->first()['id_usr'];
        $status= User::where('id',$id_user)->first()['status'];
        $arr1 = array('status' => $status);
        $doctorData['lekarz'] = $doctorData['lekarz'] + $arr1;

        $visits = Deadline::findDoctorAllDeadlines($id);
        
        if ($doctorData==false) {
            abort(404);
            return;
        }

        return View('recepcja-panel/lekarz', ['doctorData' => $doctorData, 'visits' => $visits]);
    }

    /**
	*Funkcja odpowiada za zmianę danych danego pacjenta
	*@param integer $id Id pacjenta
	*@return redirect widok listy pacjentów
	*/
    public function changePatientData($id,Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        $name = $request->input('imie');
        $surname = $request->input('nazwisko');
        $email = $request->input('email');
        $pesel = $request->input('pesel');
        $adres = $request->input('adres');
        $telefon= $request->input('phone');
        $data_ur= $request->input('data_urodzenia');

        $patientId = $id;

        $patient = Patient::where('id',$patientId)->first();
        $usr_id = $patient->id_usr;
        $user = User::where('id',$usr_id)->first();

        $user->changeData($usr_id,$name, $email);
        $patient->changeData($usr_id,$name,$surname,$email,$pesel,$adres,$telefon,$data_ur);


        return redirect('recepcja/lista_pacjentow')->with('info', 'Dane zostały zmienione');
    }
    /**
	*Funkcja odpowiada za zmianę hasła danego pacjenta
	*@param integer $id Id pacjenta
	*@return redirect widok listy pacjentów
	*/
    public function changePatientPassword($id,Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        $new = $request->input('haslo1');
        $new2 = $request->input('haslo2');
        $patient = Patient::where('id',$id)->first();
        $usr_id = $patient->id_usr;
        $user = User::where('id',$usr_id)->first();
        $user->ForceNewPassword($usr_id,$new,$new2);
       
        return redirect('recepcja/lista_pacjentow')->with('info', 'Hasło zostało zmienione');
    }


}