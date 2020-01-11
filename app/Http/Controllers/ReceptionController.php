<?php
namespace App\Http\Controllers;

use App\Patient;
use App\Doctor;
use App\Deadline;
use App\User;
use App\Visit;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceptionController extends Controller {

    public function mainSite()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        return View('recepcja-panel/recepcja');
    }

    public function patientRegisterFormView()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        return View('/recepcja-panel/dodaj-pacjenta');
    }


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


    public function doctorRegisterFormView()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        return View('recepcja-panel/dodaj-lekarza');
    }

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

    public function doctorsList()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        $doctors = Doctor::orderBy('nazwisko','asc')->get();;
        return View('recepcja-panel/lista-lekarzy', ['doctors' => $doctors]);
    }

    public function doctorsListForVisits()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        $doctors = Doctor::orderBy('nazwisko','asc')->get();;
        return View('recepcja-panel/wizyty', ['doctors' => $doctors]);
    }

    public function doctorsListForAPatient()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        $doctors = Doctor::orderBy('nazwisko','asc')->get();;
        return View('recepcja-panel/nowa-wizyta', ['doctors' => $doctors]);
    }

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

     public function patientsList()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        $patients = Patient::orderBy('nazwisko','asc')->get();;
        return View('recepcja-panel/lista-pacjentow', ['patients' => $patients]);
    }


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

    public function allVisits()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        $visit = new Visit();
        $visits = $visit->getAllVisits();
        return View('recepcja-panel/wizyty', ['visits' => $visits]);
    }

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
    public function deleteVisit(Request $request){
        $patientId = $request->input('id_pacjenta');
        $visitId = $request->input('id_wizyty');

        Visit::where('id', $visitId)->delete();
         return redirect('/recepcja/pacjent/'.$patientId)->with('info', 'Wizyta została odwołana.');
    }

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
}