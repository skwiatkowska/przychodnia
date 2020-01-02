<?php
namespace App\Http\Controllers;

use App\Visit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class VisitController extends Controller
{

    public function visitsView()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $visit = new Visit();
        $patientId = Auth::id();
        $pastVisits = $visit->getPastVisits($patientId);
        $futureVisits=$visit->getFutureVisits($patientId);
        $todaysVisits=$visit->getTodaysVisits($patientId);

        return View('pacjent-panel/panel-wizyty', ['wizyty' => $pastVisits]);
    }

    public function addVisit(Request $request)
    {
        $patientId = Auth::id();
        $doctorId = $request->query('id_lekarza');
        $date = $request->query('data');
        $hour = $request->query('godzina');

        $visit = new Visit();
        $isVisit = $visit->addVisit($patientId, $doctorId, $date, $hour,$description = "", $recommendations = "");

        if ($isVisit) {
            return redirect('/panel/wizyty')->with('info', 'Wizyta została poprawnie zarezerwowana.');
        }

        $errors = $visit->getErrors();
        return redirect('/terminy/'.$doctorId)->with('errors', $errors);

    }

    public function deleteVisit(Request $request)
    {
        $visitId = $request->input('id_wizyty');

        Visit::where('id', $visitId)->delete();

        return redirect('/panel/wizyty')->with('info', 'Wizyta została odwołana');

    }
}