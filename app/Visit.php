<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
* Klasa odpowiedzialna za wizyty.
*/

class Visit extends Model
{
    protected $table = 'visits';
    public $timestamps = false;
    private $errors = [];

	/**
	 * Funkcja dodaje nową wizytę do bazy.
	 * @param integer $patientId Id danego pacjenta
	 * @param integer $doctorId Id danego lekarza
	 * @param date $date Data wizyty
	 * @param string $hour Godzina wizyty
	 * @param string $description Opis wizyty
	 * @param string $recommendations Zalecenia lekarza
	 * @return boolean TRUE jeśli udało się dodać historię do bazy. 
	 FALSE jeśli nastąpiła próba nieautoryzowanego dostępu, bądź niepoprawnie wypełniono pola.
	*/
    public function addVisit($patientId, $doctorId, $date, $hour, $description, $reccomendations)
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
        $visit->opis = $description;
        $visit->zalecenia = $reccomendations;
        $visit->save();

        return true;
    }
	
	/**
	*Funkcja zwraca błędy.
	*/
    public function getErrors()
    {
        return $this->errors;
    }


	/**
	* Funkcja zwraca wizyty danego pacjenta z dzisiejszego dnia.
	* @param integer $patientId Id danego pacjenta
	* @return array Wizyty danego pacjenta z dzisiaj
	*/
	public function getTodaysVisits($patientId){
		$today = date("Ymd");
			$doctorId = [];

			$doctors = [];
			$visits = Visit::where('id_pacjenta', $patientId)->whereDate('rok_miesiac_dzien',$today)->orderBy('rok_miesiac_dzien','asc')->get();
			foreach ($visits as $visit) {
				if (!in_array($visit['id_lekarza'], $doctorId)) {
					$doctorId[] = $visit['id_lekarza'];
				}
			}
			if (!empty($doctorId)) {
				$result = Doctor::whereIn('id', $doctorId)->get();

				foreach ($result as $doctor) {
					$doctors[$doctor->id] = $doctor->tytul . " " . $doctor->imie . " " . $doctor->nazwisko ." - ". $doctor->specjalizacja;
				}
			}

			// Jezeli znaleziono jakis lekarzy to odpowiedniego lekarza przypisz do kazdej wizyty
			foreach ($visits as $visit) {

				if (!empty($doctors[$visit->id_lekarza])) {
					$visit->lekarz = $doctors[$visit->id_lekarza];
				} else {
					// @codeCoverageIgnoreStart
					$visit->lekarz = "";
					// @codeCoverageIgnoreEnd
				}
			}
			return $visits;

	}
	
	/**
	* Funkcja zwraca wizyty danego pacjenta z przeszłości.
	* @param integer $patientId Id danego pacjenta
	* @return array Wizyty danego pacjenta z przeszłości
	*/
    public function getPastVisits($patientId){
        $today = date("Ymd");
        $doctorId = [];

        $doctors = [];
        $visits = Visit::where('id_pacjenta', $patientId)->whereDate('rok_miesiac_dzien','<',$today)->orderBy('rok_miesiac_dzien','dec')->get();
        foreach ($visits as $visit) {
            if (!in_array($visit['id_lekarza'], $doctorId)) {
                $doctorId[] = $visit['id_lekarza'];
            }
        }
        if (!empty($doctorId)) {
            $result = Doctor::whereIn('id', $doctorId)->get();

            foreach ($result as $doctor) {
                $doctors[$doctor->id] = $doctor->tytul . " " . $doctor->imie . " " . $doctor->nazwisko ." - ". $doctor->specjalizacja;
            }
        }

        // Jezeli znaleziono jakis lekarzy to odpowiedniego lekarza przypisz do kazdej wizyty
        foreach ($visits as $visit) {

            if (!empty($doctors[$visit->id_lekarza])) {
                $visit->lekarz = $doctors[$visit->id_lekarza];
            } else {
				// @codeCoverageIgnoreStart
                $visit->lekarz = "";
				// @codeCoverageIgnoreEnd
            }
        }
        return $visits;

    }
	
	/**
	* Funkcja zwraca przyszłe wizyty danego pacjenta.
	* @param integer $patientId Id danego pacjenta
	* @return array Przyszłe wizyty danego pacjenta
	*/
    public function getFutureVisits($patientId)
    {
        $today = date("Ymd");
        $doctorId = [];

        $doctors = [];
        $visits = Visit::where('id_pacjenta', $patientId)->whereDate('rok_miesiac_dzien','>',$today)->orderBy('rok_miesiac_dzien','asc')->get();
        foreach ($visits as $visit) {
            if (!in_array($visit['id_lekarza'], $doctorId)) {
                $doctorId[] = $visit['id_lekarza'];
            }
        }
        if (!empty($doctorId)) {
            $result = Doctor::whereIn('id', $doctorId)->get();

            foreach ($result as $doctor) {
                $doctors[$doctor->id] = $doctor->tytul . " " . $doctor->imie . " " . $doctor->nazwisko ." - ". $doctor->specjalizacja;
            }
        }

        // Jezeli znaleziono jakis lekarzy to odpowiedniego lekarza przypisz do kazdej wizyty
        foreach ($visits as $visit) {

            if (!empty($doctors[$visit->id_lekarza])) {
                $visit->lekarz = $doctors[$visit->id_lekarza];
            } else {
				// @codeCoverageIgnoreStart
                $visit->lekarz = "";
				// @codeCoverageIgnoreEnd
            }
        }
        return $visits;
    }


	/**
	* Funkcja znajduje wszystkie informacje o pacjencie: dane i wizyty.
	* @param integer $id Id danego pacjenta
	* @return array Wszystkie informacje o pacjencie: dane i wizyty
	*/
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
        $today = date("Ymd");

        $patientPastVisits = self::where('id_pacjenta','=',$usr_id)->where('rok_miesiac_dzien','<',$today)->get();
       
        $patientFutureVisits = self::where('id_pacjenta','=',$usr_id)->where('rok_miesiac_dzien','>',$today)->get();
        $patientTodaysVisits = self::where('id_pacjenta','=',$usr_id)->where('rok_miesiac_dzien',$today)->get();


        foreach ($patientPastVisits as $visit) {
                $patientVisits[$visit->id] = [$visit->rok_miesiac_dzien , $visit->godzina_minuta];
            }

        foreach ($patientPastVisits as $visit) {
            if (!in_array($visit['id_lekarza'], $doctorId)) {
                $doctorId[] = $visit['id_lekarza'];
            }
        }

        if (!empty($doctorId)) {
            $result = Doctor::whereIn('id', $doctorId)->get();

            foreach ($result as $doctor) {
                $doctors[$doctor->id] = $doctor->tytul . " " . $doctor->imie . " " . $doctor->nazwisko ." - ". $doctor->specjalizacja;
                $room[$doctor->id] = $doctor->gabinet;

            }
        }

        foreach ($patientPastVisits as $visit) {

            if (!empty($doctors[$visit->id_lekarza])) {
                $visit->lekarz = $doctors[$visit->id_lekarza];
                $visit->gabinet = $room[$visit->id_lekarza];

            } else {
                $visit->lekarz = "";
                $visit->gabinet = "";

            }
        }
    //
    foreach ($patientFutureVisits as $visit) {
        $patientVisits[$visit->id] = [$visit->rok_miesiac_dzien , $visit->godzina_minuta];
    }

        foreach ($patientFutureVisits as $visit) {
            if (!in_array($visit['id_lekarza'], $doctorId)) {
                $doctorId[] = $visit['id_lekarza'];
            }
        }
        if (!empty($doctorId)) {
            $result = Doctor::whereIn('id', $doctorId)->get();

            foreach ($result as $doctor) {
                $doctors[$doctor->id] = $doctor->tytul . " " . $doctor->imie . " " . $doctor->nazwisko ." - ". $doctor->specjalizacja;
                $room[$doctor->id] = $doctor->gabinet;

            }
        }


        foreach ($patientFutureVisits as $visit) {

            if (!empty($doctors[$visit->id_lekarza])) {
                $visit->lekarz = $doctors[$visit->id_lekarza];
                $visit->gabinet = $room[$visit->id_lekarza];

            } else {
                $visit->lekarz = "";
                $visit->gabinet = "";

            }
        }
        //
        foreach ($patientTodaysVisits as $visit) {
            $patientVisits[$visit->id] = [$visit->rok_miesiac_dzien , $visit->godzina_minuta];
        }

        foreach ($patientTodaysVisits as $visit) {
            if (!in_array($visit['id_lekarza'], $doctorId)) {
                $doctorId[] = $visit['id_lekarza'];
            }
        }
        if (!empty($doctorId)) {
            $result = Doctor::whereIn('id', $doctorId)->get();

            foreach ($result as $doctor) {
                $doctors[$doctor->id] = $doctor->tytul . " " . $doctor->imie . " " . $doctor->nazwisko ." - ". $doctor->specjalizacja;
                $room[$doctor->id] = $doctor->gabinet;

            }
        }


        foreach ($patientTodaysVisits as $visit) {

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
            "wizytyNadchodzace" => $patientFutureVisits,
             "wizytyPrzeszle" =>$patientPastVisits,
             "wizytyDzis" =>$patientTodaysVisits

    ];

    }

	/**
	* Funkcja znajduje wszystkie wizyty.
	* @return array Wszystkie wizyty
	*/
    public function getAllVisits()
    {
       $visits = Visit::all();


      if ($visits==null){
		// @codeCoverageIgnoreStart
        return false;
		// @codeCoverageIgnoreEnd
        }

  
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
    }

    return ["lekarz" => [
            "id" => $lekarz->id,
            "imie" => $lekarz->imie,
            "nazwisko" => $lekarz->nazwisko,
            "daty" => [
                "dzien"=> $visit->rok_miesiac_dzien
                
            ]
        ]
    ];
    }

	/**
	* Funkcja znajduje wszystkie informacje o lekarzu: dane i wizyty.
	* @param integer $id Id danego lekarza
	* @return array Wszystkie informacje o lekarzu: dane i wizyty
	*/
    static function findAllDoctorData($id)
    {
        $patId = [];

        $doctor = Doctor::where('id',$id) -> first();

        if ($doctor == null){
            return false;
        }
        $usr_id = $doctor->id_usr;

        $docVisits=[];
        $visit_id=[];
        $docAllVisits = self::where('id_lekarza','=',$usr_id)->get();
       

        foreach ($docAllVisits as $visit) {
                $docVisits[$visit->id] = [$visit->rok_miesiac_dzien , $visit->godzina_minuta];
            }

            foreach ($docAllVisits as $visit) {
                if (!in_array($visit['id_pacjenta'], $patId)) {
                    $patId[] = $visit['id_pacjenta'];
                }
            }

        if (!empty($patId)) {
            $result = Patient::whereIn('id', $patId)->get();

            foreach ($result as $patient) {
                $patients[$patient->id] = $patient->imie . " " . $patient->nazwisko;
            }
        }

        foreach ($docAllVisits as $visit) {

            if (!empty($patients[$visit->id_pacjenta])) {
                $visit->pacjent = $patients[$visit->id_pacjenta];
            } else {
                $visit->pacjent = "";

            }
        }

        return [
            "lekarz" =>[
                "id" => $doctor->id,
                "tytul" => $doctor->tytul,
                "imie" => $doctor->imie,
                "nazwisko" => $doctor->nazwisko,
                "email"=>$doctor->email,
                "gabinet"=>$doctor->gabinet,
                "telefon"=>$doctor->telefon,
                "specjalizacja"=>$doctor->specjalizacja,

            ],
            "wizyty" => $docAllVisits
    ];

    }


	/**
	 * Funkcja dodaje opis do wizyty.
	 * @param integer $id_wizyty Id danej wizyty
	 * @param string $description Opis wizyty
	 * @param string $recommendations Zalecenia lekarza
	 * @return boolean TRUE jeśli udało się dodać opis do wizyty. 
	*/
    public function addDescription($id_wizyty,$description,$recommendation)
    {
        $visit = Visit::where('id',$id_wizyty)->first();     
        if ($description) {
            $visit->opis = $description;
        }
        if ($recommendation) {
            $visit->zalecenia = $recommendation;
        }
        $visit->save();
        return true;   

    }

  

}