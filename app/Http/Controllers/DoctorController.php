<?php
namespace App\Http\Controllers;

use App\Doctor;
use App\Deadline;
use App\Patient;
use App\Visit;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class DoctorController extends Controller
{

    public function mainSite()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        return View('lekarz-panel/panel-lekarza');
    }

     public function doctorsList()
    {
        $doctors = Doctor::orderBy('nazwisko','asc')->get();
        return View('lista-lekarzy', ['doctors' => $doctors]);
    }

    public function doctorsDeadlines($id)
    {
        $doctorsDeadlines = Deadline::findDoctorFreeDeadlines($id);

        if ($doctorsDeadlines==false) {
            abort(404);
            return;
        }

        return View('terminy', ['doctorsDeadlines' => $doctorsDeadlines]);
    }

    public function patientsList()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        $patients = Patient::orderBy('nazwisko','asc')->get();
        return View('lekarz-panel/lista-pacjentow', ['patients' => $patients]);
    }

    public function doctorInfo()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }
        if (!Auth::check()) {
            return redirect('/login');
        }

        $doctor = new Doctor();
        $doctorId = Auth::id();
        
        $allData= $doctor->getData($doctorId);

        return View('lekarz-panel/dane', ['data' => $allData]);
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

        return View('lekarz-panel/pacjent', ['patientData' => $patientData]);
    }

    public function visits(){
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Aby przejść na wybraną stronę, musisz być zalogowany.');
        }

        $doctor = new Doctor();
        $doctorId = Auth::id();
        $allvisits = Visit::where('id_lekarza',$doctorId)->get();
       
        $fullVisits = Deadline::findDoctorAllDeadlines($doctorId);
        return View('lekarz-panel/wizyty', ['data' => $fullVisits]);
        //return redirect('lekarz-panel/wizyty');//->with('info','wizyty'.$fullVisits);
    }
}