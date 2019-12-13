<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Visit extends Model
{
    protected $table = 'visits';
    public $timestamps = false;
    private $errors = [];

    public function addVisit($patientId, $doctorId, $date, $hour)
    {
        if (!Auth::check()) {
            $this->errors[] = 'Aby dokonać rezerwacji musisz być <a href="/login">zalogowany!</a>!';
            return false;
        }

        $busyDeadline = Visit::
        where('id_lekarza', $doctorId)
            ->where('rok_miesiac_dzien', $date)
            ->where('godzina_minuta', $hour)
            ->first();

        if ($busyDeadline) {
            $this->errors[] = 'Wybrany termin jest już zarezerwowany';
            return false;
        }

        $secondVisit = Visit::where('id_pacjenta', $patientId)
            ->where('id_lekarza', $doctorId)
            ->where('rok_miesiac_dzien', $date)
            ->first();

        if ($secondVisit) {
            $this->errors[] = 'Możesz dokonać tylko jednej rezerwacji wizyty w ciągu dnia!';
            return false;
        }

        $visit = new Visit();
        $visit->id_lekarza = $doctorId;
        $visit->id_pacjenta = $patientId;
        $visit->rok_miesiac_dzien = $date;
        $visit->godzina_minuta = $hour;
        $visit->save();

        return true;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function getWizyty($patientId)
    {
        // Tablica przechowujaca id lekarzy np [ 12, 15, 17 ]
        $doctorId = [];
        /** Tablica przechowujaca imie i nazwisko lekarza np:
         * [
         *  12 => "Kowalski Jan"
         *  15 => "Mikłowicz Sebastian"
         *  17 => "Samorodej Sabina"
         * ]
         */
        $doctors = [];
        // Wyciagamy wszystkie wizyty danego pacjenta
        $visits = Visit::where('id_pacjenta', $patientId)->orderBy('rok_miesiac_dzien', 'asc')->get();
        // Wyciagamy id lekarzy z pobranych wizyt
        foreach ($visits as $visit) {
            if (!in_array($visit['id_lekarza'], $doctorId)) {
                // Dodajemy nowy id lekarza
                $doctorId[] = $visit['id_lekarza'];
            }
        }
        // Sprawdzamy czy w ogole warto szukac całych lekarzy (bo jak cos dysponujemy na razie samymi id'kami)
        if (!empty($doctorId)) {
            // Robimy SQL: SELECT * FROM lekarze WHERE id IN (12, 15, 17)
            $result = Doctor::whereIn('id', $doctorId)->get();
            // Jezeli znaleziono lekarzy to zapisujemy ich do tablicy po ich kluczu
            // tzn 12 => "Kowalski Jan"

            foreach ($result as $doctor) {
                $doctors[$doctor->id] = $doctor->tytul . " " . $doctor->imie . " " . $doctor->nazwisko;
            }
        }


        // Jezeli znaleziono jakis lekarzy to odpowiedniego lekarza przypisz do kazdej wizyty
        foreach ($visits as $visit) {

            if (!empty($doctors[$visit->id_lekarza])) {
                $visit->lekarz = $doctors[$visit->id_lekarza];
            } else {
                $visit->lekarz = "";
            }
        }
        return $visits;
    }



    static function findAllPatientData($id)
    {
        $patient = Patient::where('id',$id) -> first();

        if ($patient == null){
            return false;
        }

        //$patientVisits=[];
        $patientAllVisits = self::where('id_pacjenta','=',$id)->get();

        //$patientData = $patient->get();
        return [
            "pacjent" =>[
                "id" => $patient->id,
                "imie" => $patient->imie,
                "nazwisko" => $patient->nazwisko,
                "email"=>$patient->email,
                "pesel"=>$patient->pesel,
                "telefon"=>$patient->telefon,
                "data_urodzenia"=>$patient->data_urodzenia,
                "adres"=>$patient->adres

            ],

        "wizyty" => $patientAllVisits
    ];

    }

}