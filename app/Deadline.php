<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
* Klasa odpowiedzialna za terminarz danego lekarza.
*/

class Deadline extends Model
{
    /**
	*Ustalony czas wizyty jednego pacjenta
    *@var 
	*/
	const visitTime = 30;

    protected $table = 'deadlines';
    public $timestamps = false;

	/**
	*Funkcja znajduje wolne terminy danego lekarza.
	*@param integer $doctorId Id danego lekarza
	*@return array Dane lekarza oraz jego wolne terminy
	*/
    static function findDoctorFreeDeadlines($doctorId)
    {
        $doctor = Doctor::where('id', $doctorId)->first();

        if ($doctor==null){
            return false;
        }

        $doctorDeadlines = self::where('id_lekarza', '=', $doctorId)->get();

        $hourVisitFrom = [];
        $hourVisitTo = [];
        $doctorCalendar = [];

        foreach ($doctorDeadlines as $visitHours) {

            $hourStart = $visitHours['godzina_od'];

            $pattern = "/(^\d+):(\d+)/";

            preg_match($pattern, $hourStart, $hourVisitFrom);

            $hourEnd = $visitHours['godzina_do'];

            preg_match($pattern, $hourEnd, $hourVisitTo);

            $date = $visitHours['rok_miesiac_dzien'];

            $start = $hourVisitFrom[0];
            $end = $hourVisitTo[0];

            $doctorCalendar[$date] = [];

            while (strtotime($start) < strtotime($end)) {
                $doctorCalendar[$date][] = $start;
                $start = date('H:i', strtotime($start . '+' . self::visitTime . ' minutes'));
            }
        }

        $visitDays = array_keys($doctorCalendar);
        //wszystkie wizyty danego dnia
        $visits = Visit::where('id_lekarza', $doctorId)
            ->whereIn('rok_miesiac_dzien', $visitDays)
            ->get();

        $busyVisits = [];

        //usunięcie zajętych wizyt
        foreach ($visits as $visit) {

            if (!array_key_exists($visit->rok_miesiac_dzien, $busyVisits)) {
                $busyVisits[$visit->rok_miesiac_dzien] = [];
            }
            $busyVisits[$visit->rok_miesiac_dzien][] = substr($visit->godzina_minuta, 0, 5);

        }

        // z tablicy termianrz usuwamy godziny ktore wystepuja w tablicy zajeteWizyty
        /*
         * $zajeteWizyty = ['5-30-1987'=>[12:00]]
         * $termianrz = ['5-30-1987'=>[8:00, 9:00, 12:00]]
         * $wynik = ['5-30-1987'=>[8:00, 9:00]]
         */

   
        foreach ($doctorCalendar as $data => $hours) {
            if (array_key_exists($data, $busyVisits)) {
                foreach ($hours as $hour) {
                    $hasFound = in_array($hour, $busyVisits[$data]);
                    if ($hasFound) {
                        $key = array_search($hour, $doctorCalendar[$data]);
                        unset($doctorCalendar[$data][$key]);
                    }
                }
            }
        }
      
        return [
            "lekarz" => [
                "id" => $doctor->id,
                "imie" => $doctor->imie,
                "nazwisko" => $doctor->nazwisko,
                "tytul" => $doctor->tytul

            ],
            "terminy" => $doctorCalendar
        ];

    }

	/**
	*Funkcja znajduje wszystkie terminy danego lekarza.
	*@param integer $doctorId Id danego lekarza
	*@return array Dane lekarza oraz jego wszystkie terminy
	*/
    static function findDoctorAllDeadlines($doctorId)
    {
        $doctor = Doctor::where('id', $doctorId)->first();

        if ($doctor==null){
            return false;
        }

        $today = date("Ymd");

        $doctorDeadlines = self::where('id_lekarza', '=', $doctorId)->get();

        $hourVisitFrom = [];
        $hourVisitTo = [];
        $doctorCalendar = [];
        $doctorCalendarPast = [];

        foreach ($doctorDeadlines as $visitHours) {

            $hourStart = $visitHours['godzina_od'];

            $pattern = "/(^\d+):(\d+)/";

            preg_match($pattern, $hourStart, $hourVisitFrom);

            $hourEnd = $visitHours['godzina_do'];

            preg_match($pattern, $hourEnd, $hourVisitTo);

            $date = $visitHours['rok_miesiac_dzien'];

            $start = $hourVisitFrom[0];
            $end = $hourVisitTo[0];
            if ($date>$today){
                $doctorCalendarPast[$date]=[];
            }else{
                $doctorCalendar[$date] = [];
            
            

            while (strtotime($start) < strtotime($end)) {
                $doctorCalendar[$date][] = $start;
                $start = date('H:i', strtotime($start . '+' . self::visitTime . ' minutes'));
            }}
        }

        $visitDays = array_keys($doctorCalendar);
        //wszystkie wizyty danego dnia
        $visits = Visit::where('id_lekarza', $doctorId)
            ->whereIn('rok_miesiac_dzien', $visitDays)
            ->get();

        $patientIds=[];

        $busyVisits = [];

        //usunięcie zajętych wizyt
        foreach ($visits as $visit) {

            if (!array_key_exists($visit->rok_miesiac_dzien, $busyVisits)) {
                $busyVisits[$visit->rok_miesiac_dzien] = [];
            }
            $busyVisits[$visit->rok_miesiac_dzien][] = substr($visit->godzina_minuta, 0, 5);
            $patientIds[]=$visit->id_pacjenta;

        }
        $alldata = Deadline::join('Visits','Deadlines.id_lekarza','=','Visits.id_lekarza')->join('Patients','Patients.id','=','Visits.id_pacjenta')->where('Visits.id_lekarza', $doctorId)
        ->whereIn('Visits.rok_miesiac_dzien', $visitDays)->whereIn('Patients.id_usr',$patientIds)->get();

        $patients=Patient::whereIn('id_usr',$patientIds)->get();
        $imiona_i_nazwiska = [];
        foreach ($patients as $pacjent){

            $imiona_i_nazwiska[]=$pacjent->imie.' '.$pacjent->nazwisko;
        }


        foreach ($doctorCalendar as $data => $hours) {
            if (array_key_exists($data, $busyVisits)) {
                foreach ($hours as $hour) {
                    $hasFound = in_array($hour, $busyVisits[$data]);

                    if ($hasFound) {
                        $key = array_search($hour, $doctorCalendar[$data]); //która godzina w doctor kalendarzu
                        $key2 = array_search($hour, $busyVisits[$data]); //która godzina w doctor kalendarzu
                        
                        $alldata1 = Deadline::join('Visits','Deadlines.id_lekarza','=','Visits.id_lekarza')->join('Patients','Patients.id_usr','=','Visits.id_pacjenta')->where('Visits.id_lekarza', $doctorId)
        ->where('Visits.rok_miesiac_dzien', $data)->where('Visits.godzina_minuta',$hour)->first();

                        
                        $doctorCalendar[$data][$key] = implode([$doctorCalendar[$data][$key]," ----- ".$alldata1->imie.' '.$alldata1->nazwisko.' ----- nr PESEL: '.$alldata1->pesel]);
                    }else{
                        $key = array_search($hour, $doctorCalendar[$data]);
                        $doctorCalendar[$data][$key] = implode([$doctorCalendar[$data][$key],"  "]);
                    }
                }
            }
        }


        $past_deadlines=[];
        $future_deadlines=[];

      
        return [
            "lekarz" => [
                "id" => $doctor->id,
                "imie" => $doctor->imie,
                "nazwisko" => $doctor->nazwisko
            ],
            "terminy" => $doctorCalendar
        ];

    }
}