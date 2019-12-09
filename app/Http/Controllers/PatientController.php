<?php
namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class PatientController extends Controller
{


    public function patientsList()
    {
        $patients = Patient::all();
        return View('lista-pacjentow', ['patients' => $patients]);
    }
}