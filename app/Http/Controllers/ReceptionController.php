<?php
namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceptionController extends Controller {

    public function mainSite()
    {
        return View('recepcja/recepcja');
    }

     public function patientsList()
    {
        $patients = Patient::all();
        return View('recepcja/lista-pacjentow', ['patients' => $patients]);
    }
}