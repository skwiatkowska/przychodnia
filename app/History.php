<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Patient;
use Illuminate\Support\Facades\Auth;

/**
 * Klasa odpowiedzialna za historię wizyt pacjenta. 
 * @codeCoverageIgnore
 */

class History extends Model
{
    protected $table = 'histories';

    public $timestamps = false;
    private $errors = [];

	/**
	 * Funkcja dodaje nową historię wizyty do bazy.
	 * @param integer $patient_id Id danego pacjenta
	 * @param integer $doctor_id Id danego lekarza
	 * @param date $date Data wizyty
	 * @param string $description Opis wizyty
	 * @param string $recommendations Zalecenia lekarza
	 * @return boolean TRUE jeśli udało się dodać historię do bazy. 
	 FALSE jeśli nastąpiła próba nieautoryzowanego dostępu, bądź niepoprawnie wypełniono pola.
	 * @codeCoverageIgnore
	 */
    public function addNewHistory($patient_id, $doctor_id, $date,$description, $recommendations)
    {
        $data = [
            $patient_id, 
            $doctor_id, 
            $date,
            $description, 
            $recommendations
        ];

        if (!Auth::check()) {
            $this->errors[] = 'Aby zobaczyć historię musisz byc <a href="/login">zalogowany!</a>!';
            return false;
        }


        foreach ($data as $input) {
            if (empty($input)) {
                $this->errors[] = 'Wszystkie pola sa obowiazkowe';
                return false;
            }
        }

        $history = new History();
        $history->patient_id = $patient_id;
        $history->doctor_id = $doctor_id; 
        $history->date =$date;
        $history->description =$description; 
        $history->recommendations = $recommendations;
        $history->save();
   


        return true;
    }
	/**
	 * Funkcja zwraca wszystkie historie wizyt pacjenta.
	 * @param integer $patient_id Id danego pacjenta
	 * @return array Wszystkie historie wizyt pacjenta
	 * @codeCoverageIgnore
	 */
    public function getHistory($patient_id)
    {
        $doctor_id = [];

        $doctors = [];
        $hists = History::where('patient_id', $patient_id)->orderBy('date', 'asc')->get();
        foreach ($hists as $history) {
            if (!in_array($history['doctor_id'], $doctor_id)) {
                $doctor_id[] = $history['doctor_id'];
            }
        }
        if (!empty($doctor_id)) {
            $result = Doctor::whereIn('id', $doctor_id)->get();
            foreach ($result as $doctor) {
                $doctors[$doctor->id] = $doctor->nazwisko . " " . $doctor->imie;
            }
        }


        foreach ($hists as $history) {

            if (!empty($doctors[$history->doctor_id])) {
                $history->doctor_id = $doctors[$history->doctor_id];
            } else {
                $history->doctor_id = "";
            }
        }
        return $hists;
    }
}
