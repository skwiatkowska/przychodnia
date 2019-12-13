<?php
namespace App\Http\Controllers;

use App\Patient;
use App\Doctor;
use App\Deadline;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceptionController extends Controller {

    public function mainSite()
    {
        return View('recepcja-panel/recepcja');
    }

    public function patientRegisterFormView()
    {
        return View('/recepcja-panel/dodaj-pacjenta');
    }

    public function patientRegister(Request $request)
    {
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
        return View('/recepcja-panel/dodaj-lekarza');
    }

    public function doctorRegister(Request $request)
    {
  //do napisania
    }


    public function doctorsList()
    {
        $doctors = Doctor::all();
        return View('recepcja-panel/lista-lekarzy', ['doctors' => $doctors]);
    }

    public function doctorsDeadlines($id)
    {
        $doctorsDeadlines = Deadline::findDoctorFreeDeadlines($id);

        if ($doctorsDeadlines==false) {
            abort(404);
            return;
        }

        return View('recepcja-panel/lekarz', ['doctorsDeadlines' => $doctorsDeadlines]);
    }

     public function patientsList()
    {
        $patients = Patient::all();
        return View('recepcja-panel/lista-pacjentow', ['patients' => $patients]);
    }


    public function patientData($id)
    {
        $patientData= Patient::findAllPatientData($id);

        if ($patientData==false) {
            abort(404);
            return;
        }

        return View('recepcja-panel/lekarz', ['patientData' => $patientData]);
    }

    


}