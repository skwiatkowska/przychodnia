<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Patient;

class PatientController extends Controller {

    public function mainSite ()
    {
        if (Auth::check()) {
            return View('panel');
        } else {
            return redirect('/login');
        }
    }

    public function settings()
    {
        return view('panel-ustawienia');
    }

    public function patientInfo()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $patient = new Patient();
        $patientId = Auth::id();
        
        $allData= $patient->getData($patientId);

        return View('panel-dane', ['data' => $allData]);
    }
}