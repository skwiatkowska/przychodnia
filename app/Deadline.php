<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Deadline extends Model
{
    //Ustalony czas wizyty jednego pacjenta.
    const visitTime = 30;

    protected $table = 'deadlines';
    public $timestamps = false;


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
        /**
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
                "nazwisko" => $doctor->nazwisko
            ],
            "terminy" => $doctorCalendar
        ];

    }
}