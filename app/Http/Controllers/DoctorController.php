<?php
namespace App\Http\Controllers;

use App\Doctor;
use App\Deadline;
use App\Patient;
use App\Visit;
use App\User;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


/**
* Kontroler panelu lekarza.
*/
class DoctorController extends Controller
{
	/**
	*Funkcja odpowiada za wyświetlenie panelu lekarza.
	*@return view Widok panelu lekarza
	*/
    public function mainSite()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        return View('lekarz-panel/panel-lekarza');
    }

	/**
	*Funkcja odpowiada za wyświetlenie listy lekarzy.
	*@return view Widok listy lekarzy
	*/
     public function doctorsList()
    {
        $doctors = Doctor::orderBy('nazwisko','asc')->get();
        return View('lista-lekarzy', ['doctors' => $doctors]);
    }

	/**
	*Funkcja odpowiada za wyświetlenie wolnych terminów lekarza.
	*@return view Widok terminów lekarza
	*/
    public function doctorsDeadlines($id)
    {
        $doctorsDeadlines = Deadline::findDoctorFreeDeadlines($id);

        if ($doctorsDeadlines==false) {
            abort(404);
        }

        return View('terminy', ['doctorsDeadlines' => $doctorsDeadlines]);
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
        $login_id= Auth::id();
        $user_logged = User::where('id',$login_id)->first();
        $role = $user_logged->user_type;
        if ($role != 'doctor'){
            return redirect('/')->with('info', 'Strona niedostępna!');
        }
        $doctorId_usr = Auth::id();
        $doctor = Doctor::where('id_usr',$doctorId_usr)->first();
        $doctor_id=$doctor->id;
        $all=Visit::where('id_lekarza',$doctor_id)->join('patients','Visits.id_pacjenta','=','Patients.id_usr')->orderBy('nazwisko','asc')->get();
        return View('lekarz-panel/lista-pacjentow', ['patients' => $all]);
    }

	/**
	*Funkcja odpowiada za wyświetlenie danych lekarza.
	*@return view Widok danych lekarza
	*/
    public function doctorInfo()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        $login_id= Auth::id();
        $user_logged = User::where('id',$login_id)->first();
        $role = $user_logged->user_type;
        if ($role != 'doctor'){
            return redirect('/')->with('info', 'Strona niedostępna!');
        }
      
        $doctor = new Doctor();
        $doctorId = Auth::id();
        
        $allData= $doctor->getData($doctorId);

        return View('lekarz-panel/dane', ['data' => $allData]);
    }

	/**
	*Funkcja odpowiada za wyświetlenie danych pacjenta.
	*@return view Widok danych pacjenta
	*/
    public function patientData($id)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        $login_id= Auth::id();
        $user_logged = User::where('id',$login_id)->first();
        $role = $user_logged->user_type;
        if ($role != 'doctor'){
            return redirect('/')->with('info', 'Strona niedostępna!');
        }
        $patientData= Visit::findAllPatientData($id);

        if ($patientData==false) {
            abort(404);
        }
        $doctor = new Doctor();
        $doctorId = Auth::id();
        
        $doctorData= $doctor->getData($doctorId);
        

        return View('lekarz-panel/pacjent', ['patientData' => $patientData, 'doctorData' => $doctorData]);
    }
 
	/**
	*Funkcja odpowiada za wyświetlenie wizyt u lekarza.
	*@return view Widok wizyt u lekarza
	*/
    public function visits(){
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        $login_id= Auth::id();
        $user_logged = User::where('id',$login_id)->first();
        $role = $user_logged->user_type;
        if ($role != 'doctor'){
            return redirect('/')->with('info', 'Strona niedostępna!');
        }
        
        $doctorId = Auth::id();
        
        $doctor = Doctor::where('id_usr',$doctorId)->first();
        $doctorId_correct = $doctor->id;

        $allvisits = Visit::where('id_lekarza',$doctorId_correct)->get();
       
        $fullVisits = Deadline::findDoctorAllDeadlines($doctorId_correct);
        return View('lekarz-panel/wizyty', ['data' => $fullVisits]);
        //return redirect('lekarz-panel/wizyty');//->with('info','wizyty'.$fullVisits);
    }

	/**
	*Funkcja odpowiada za przesłanie danych do dodania opisu wizyty.
	*@return integer $id Id wizyty
	*@return void Przy dododaniu opisu wizyty zakończonym sukcesem - przekierowuje na
	stronę pacjenta.
	*/
    public function addVisitDescription($id,Request $request){
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        $login_id= Auth::id();
        $user_logged = User::where('id',$login_id)->first();
        $role = $user_logged->user_type;
        if ($role != 'doctor'){
            return redirect('/')->with('info', 'Strona niedostępna!');
        }
        
		//@codeCoverageIgnoreStart
        $description = $request->input('opis');
        $recommendation = $request->input('zalecenia');
        $patientId = $request->input('id_pacjenta');
        $visitId = $request->input('id_wizyty');

        $visit = Visit::where('id',$visitId)->first();
        $check = $visit->addDescription($visitId,$description,$recommendation);
        
        return redirect('/panel_lekarza/pacjent/'.$patientId)->with('info', 'Dodano opis wizyty.');
		//@codeCoverageIgnoreEnd
    }
}