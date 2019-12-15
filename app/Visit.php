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
        $doctorId = [];

        $doctors = [];
        $visits = Visit::where('id_pacjenta', $patientId)->orderBy('rok_miesiac_dzien', 'asc')->get();
        foreach ($visits as $visit) {
            if (!in_array($visit['id_lekarza'], $doctorId)) {
                $doctorId[] = $visit['id_lekarza'];
            }
        }
        if (!empty($doctorId)) {
            $result = Doctor::whereIn('id', $doctorId)->get();

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
        $doctorId = [];

        $patient = Patient::where('id',$id) -> first();

        if ($patient == null){
            return false;
        }
        $usr_id = $patient->id_usr;
        $patientVisits=[];
        $visit_id=[];
        $patientAllVisits = self::where('id_pacjenta','=',$usr_id)->get();

        foreach ($patientAllVisits as $visit) {
                $patientVisits[$visit->id] = [$visit->rok_miesiac_dzien , $visit->godzina_minuta];
            }

            foreach ($patientAllVisits as $visit) {
                if (!in_array($visit['id_lekarza'], $doctorId)) {
                    $doctorId[] = $visit['id_lekarza'];
                }
            }

        if (!empty($doctorId)) {
            $result = Doctor::whereIn('id', $doctorId)->get();

            foreach ($result as $doctor) {
                $doctors[$doctor->id] = $doctor->tytul . " " . $doctor->imie . " " . $doctor->nazwisko;
                $room[$doctor->id] = $doctor->gabinet;

            }
        }

        foreach ($patientAllVisits as $visit) {

            if (!empty($doctors[$visit->id_lekarza])) {
                $visit->lekarz = $doctors[$visit->id_lekarza];
                $visit->gabinet = $room[$visit->id_lekarza];

            } else {
                $visit->lekarz = "";
                $visit->gabinet = "";

            }
        }

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


    public function getAllVisits()
    {
       $visits = Visit::all()->select('id_lekarza','rok_miesiac_dzien','id_pacjenta')->get()->groupBy('id_lekarza','rok_miesiac_dzien');
       return($visits);
       $visits = Visit::all();
       /* // grupowanie wizyt lekarz -> dni -> pacjenci
       $idLekarzy = [];
       foreach($visits as $visit){
            if (!in_array($visit['id_lekarza'], $idLekarzy)) {
                $idLekarzy[] = $visit['id_lekarza'];
            }
        }   
        
        $wizyty = [];
       foreach ($idLekarzy as $doctor_id){
        $lekarz = Doctor::where('id',$doctor_id) -> first();
        $daty = Visit::where('id_lekarza',$doctor_id)->get();
        $dni=[]; //unikalne dni
        foreach ($daty as $data){
            if (!in_array($data['rok_miesiac_dzien'], $dni)) {
                $dni[] = $visit['rok_miesiac_dzien'];
            }
            $pacjenci = [];
            $patients = Visit::where('id_lekarza',$doctor_id)->where('rok_miesiac_dzien',$data)->get();
            foreach( $patients as $pacjent){
             if (!in_array($pacjent['id_pacjenta'], $pacjenci)) {
                 $pacjenci[] = $pacjent['id_pacjenta'];
             }
            }
            $dane_pacjenta =[];
            foreach( $patients as $pacjent){
                $patient = Patient::where('id',$pacjent) ->first;
                $dane_pacjenta[] = $patient;
            }
            $dni[]=$dane_pacjenta;
       }
       $wizyty[]= $dni;
    }*/
       return ($visits);
    }
  

}