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

        $patient = new Patient();
        $user = new User();


       $isRegistered = $patient->addNewUser($name, $surname, $email, $pesel, $adres, $password);
        $user->addUser($name, $email, $password, $user_type="patient");

            return redirect('recepcja/lista_pacjentow')->with('info', 'Konto zostało zarejestrowane');

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

        $user_id =$user->addUser($name, $email, $password, $user_type="doctor");
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
        $doctors = Doctor::all();
        return View('recepcja-panel/lista-lekarzy', ['doctors' => $doctors]);
    }

    public function doctorsListForAPatient()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        $doctors = Doctor::all();
        return View('recepcja-panel/nowa-wizyta', ['doctors' => $doctors]);
    }

    public function doctorsDeadlinesForAPatient($id)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        $doctorsDeadlines = Deadline::findDoctorFreeDeadlines($id);

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
        $patients = Patient::all();
        return View('recepcja-panel/lista-pacjentow', ['patients' => $patients]);
    }


    public function patientData($id)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        $patientData= Visit::findAllPatientData($id);

        if ($patientData==false) {
            abort(404);
            return;
        }

        return View('recepcja-panel/pacjent', ['patientData' => $patientData]);
    }

   
    public function deleteVisit(Request $request){
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
 //do napisania wraca na strone localhost:8000/recepcja/pacjent/{id}
 //return redirect('/recepcja/pacjent/'.$patientId)->with('info', 'Wizyta została odwołana');

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
}