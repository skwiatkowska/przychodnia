<?php
namespace App\Http\Controllers;

use App\Doctor;
use App\Deadline;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class DoctorController extends Controller
{
     public function doctorsList()
    {
        $doctors = Doctor::all();
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
}