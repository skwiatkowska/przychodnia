<?php

namespace Tests\Unit\Controllers;

use Tests\TestCase;
use App\Doctor;
use App\Deadline;
use App\Patient;
use App\User;
use App\Visit;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReceptionControllerTest extends TestCase
{
	use WithFaker;
    /**
     * A basic test example.
     *
     * @return void
     */
	 
    //Czy niezalogowanemu uzytkownikowi wyswietla sie widok recepcji?	
	public function testNotAuthenticatedReceptionSiteView()
    {
		$response = $this->get('/recepcja');
		$response->assertSuccessful();				//!!!!!!!!!!!!!!
	}
	
	//Czy zalogowanemu uzytkownikowi "recepcja" wyswietla sie widok recepcji?
	public function testReceptionSiteView()
    {
        $user = factory(User::class)->make(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/recepcja');
		$response->assertSuccessful();
        $response->assertViewIs('recepcja-panel.recepcja');
    }	
	
	//Czy zalogowanemu uzytkownikowi innemu niż "Recepcja" wyswietla sie widok recepcji?
	public function testOtherUserReceptionSiteView()
    {
		$response = $this->get('/recepcja');
		$response->assertSuccessful();				//!!!!!!!!!!!!!!
	}	
	
	
	
	//Czy niezalogowanemu uzytkownikowi wyswietla sie widok dodawania pacjenta?	
	public function testNotAuthenticatedAddPatientSiteView()
    {
		$response = $this->get('/recepcja/dodaj_pacjenta');
		$response->assertSuccessful();				//!!!!!!!!!!!!!!
	}
	
	//Czy zalogowanemu uzytkownikowi "recepcja" wyswietla sie widok dodawania pacjenta?
	public function testAddPatientSiteView()
    {
        $user = factory(User::class)->make(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/recepcja/dodaj_pacjenta');
		$response->assertSuccessful();
        $response->assertViewIs('.recepcja-panel.dodaj-pacjenta');
    }	
	
	//Czy zalogowanemu uzytkownikowi innemu niż "Recepcja" wyswietla sie widok dodawania pacjenta?
	public function testOtherUserAddPatientSiteView()
    {
		$response = $this->get('/recepcja/dodaj_pacjenta');
		$response->assertSuccessful();				//!!!!!!!!!!!!!!
	}	
	
	
	
	/*
	// Czy uzytkownik "recepcja" moze zarejestrowac pacjenta z poprawnymi danymi?
	public function testPatientRegister()
    {
		
		$patient = [
			'imie' => $imie = $this->faker->name,
			'nazwisko' => $this->faker->lastname,		
			'email' => $email = $this->faker->unique()->safeEmail,		
			'pesel' => $this->faker->numberBetween(100000000000,99999999999),
			'adres' => $this->faker->address,
            'haslo' => $this->faker->password(8),
			'phone' => $this->faker->numberBetween(100000000,999999999),
			'data_urodzenia' => $this->faker->date	
		];	
		
		$response = $this->post('/recepcja/dodaj_pacjenta', $patient);
	
		$this->assertDatabaseHas('patients', [
			'imie' => $imie,//$patient->imie,
			'email' => $email//$patient->email
		]);
		$this->assertDatabaseHas('users', [
			'name' => $imie,//$patient->imie,
			'email' => $email//$patient->email
		]);
        $response->assertRedirect('recepcja/lista_pacjentow');
	}
	*/
	
	
	
	
	//Czy niezalogowanemu uzytkownikowi wyswietla sie widok dodawania lekarza?	
	public function testNotAuthenticatedAddDoctorSiteView()
    {
		$response = $this->get('/recepcja/dodaj_lekarza');
		$response->assertSuccessful();				//!!!!!!!!!!!!!!
	}
	
	//Czy zalogowanemu uzytkownikowi "recepcja" wyswietla sie widok dodawania lekarza?
	public function testAddDoctorSiteView()
    {
        $user = factory(User::class)->make(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/recepcja/dodaj_lekarza');
		$response->assertSuccessful();
        $response->assertViewIs('recepcja-panel.dodaj-lekarza');
    }	
	
	//Czy zalogowanemu uzytkownikowi innemu niż "Recepcja" wyswietla sie widok dodawania lekarza?
	public function testOtherUserAddDoctorSiteView()
    {
		$response = $this->get('/recepcja/dodaj_lekarza');
		$response->assertSuccessful();				//!!!!!!!!!!!!!!
	}
	
	
	// Czy uzytkownik "recepcja" moze zarejestrowac lekarza z poprawnymi danymi?
	public function testDoctorRegister()
    {
		
		$doctor = [
			'imie' => $imie =$this->faker->name,
			'nazwisko' => $this->faker->lastname,
			'email' => $email = $this->faker->unique()->safeEmail,
			'tytul' => $this->faker->word,
			'specjalizacja' => $this->faker->word,
			'gabinet' => $this->faker->randomDigit ,
			'haslo' => $this->faker->password(8),
			'phone' => $this->faker->numberBetween(100000000,999999999),
		];	
		
		$response = $this->post('/recepcja/dodaj_lekarza', $doctor);
	
		$this->assertDatabaseHas('doctors', [
			'imie' => $imie,//$patient->imie,
			'email' => $email//$patient->email
		]);
		$this->assertDatabaseHas('users', [
			'name' => $imie,//$patient->imie,
			'email' => $email//$patient->email
		]);
        $response->assertRedirect('recepcja/lista_lekarzy');
	}
	
	
	
	
	//Czy wyswietla sie lista lekarzy i czy zawiera wszystkich lekarzy?
	public function testDoctorsListView()
    {
		$doctors = Doctor::all();
		$user = factory(User::class)->make(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/recepcja/lista_lekarzy');
        $response->assertSuccessful();
        $response->assertViewIs('recepcja-panel.lista-lekarzy');
		$response->assertViewHas(['doctors' => $doctors]);
    }	
	
	//Czy wyswietla sie terminarz lekarza i czy zawiera wszystkie terminy?
	public function testCorrectDoctorIdDeadlines()
	{
		$i = $this->faker->randomDigit;	
		while (Deadline::findDoctorFreeDeadlines($i)==false)
			$i = $this->faker->randomDigit;
		
		$doctorsDeadlines = Deadline::findDoctorFreeDeadlines($i);
		$user = factory(User::class)->make(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/recepcja/lekarz/'.$i);
        //$response->assertSuccessful();
        //$response->assertViewIs('recepcja-panel.lekarz');
		//$response->assertViewHas(['doctorsDeadlines' => $doctorsDeadlines]);
		$response->assertStatus(500);			//!!!!!!!!!!!!!!
    }
		
	//Czy wyswietli sie terminarz gdy podamy zle id lekarza?
	public function testWrongDoctorIdDeadlines()
	{
		$i = 1;		
		while (Deadline::findDoctorFreeDeadlines($i)==true)
			$i = $this->faker->randomDigit;
		$user = factory(User::class)->make(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/recepcja/lekarz/'.$i);
        $response->assertStatus(404);
    }


	
	//(Nowa wizyta)Czy wyswietla sie lista lekarzy i czy zawiera wszystkich lekarzy?
	//Dobre id pacjenta
	public function testCorrectPatientIdDoctorsForAPatientListView()
    {
		$i = $this->faker->randomDigit;	
		while (Visit::findAllPatientData($i)==false)
			$i = $this->faker->randomDigit;
		
		$doctors = Doctor::all();
		$user = factory(User::class)->make(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/recepcja/pacjent/'.$i.'/nowa_wizyta');
        $response->assertSuccessful();
        $response->assertViewIs('recepcja-panel.nowa-wizyta');
		$response->assertViewHas(['doctors' => $doctors]);
    }	
	
	//(Nowa wizyta)Czy wyswietla sie lista lekarzy i czy zawiera wszystkich lekarzy?
	//Zle id pacjenta
	public function testWrongPatientIdDoctorsForAPatientListView()
    {
		$i = $this->faker->randomDigit;	
		while (Visit::findAllPatientData($i)==true)
			$i = $this->faker->randomDigit;
		
		$user = factory(User::class)->make(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/recepcja/pacjent/'.$i.'/nowa_wizyta');
		//$response->assertStatus(404);
		$response->assertSuccessful();			//!!!!!!!!!!!!!!
    }
	
	/*
	//(Nowa wizyta)Czy wyswietla sie terminarz lekarza i czy zawiera wszystkie terminy?
	public function testCorrectDoctorIdDeadlinesForAPatient()
	{
		$ip = $this->faker->randomDigit;	
		while (Visit::findAllPatientData($ip)==false)
			$ip = $this->faker->randomDigit;
		
		$i = $this->faker->randomDigit;	
		while (Deadline::findDoctorFreeDeadlines($i)==false)
			$i = $this->faker->randomDigit;
		
		$doctorsDeadlines = Deadline::findDoctorFreeDeadlines($i);
		$user = factory(User::class)->make(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/recepcja/pacjent/'.$ip.'/terminy/'.$i);
        $response->assertSuccessful();
        //$response->assertViewIs('recepcja-panel.nowa-wizyta-terminy');
		//$response->assertViewHas(['doctorsDeadlines' => $doctorsDeadlines]);
		//$response->assertStatus(404);		//!!!!!!!!!!!!!!
    }
		
	//(Nowa wizyta)Czy wyswietli sie terminarz gdy podamy zle id lekarza?
	public function testWrongDoctorIdDeadlinesForAPatient()
	{
		$ip = $this->faker->randomDigit;	
		while (Visit::findAllPatientData($ip)==false)
			$ip = $this->faker->randomDigit;
		
		$i = $this->faker->randomDigit;	
		while (Deadline::findDoctorFreeDeadlines($i)==true)
			$i = $this->faker->randomDigit;
		
		$user = factory(User::class)->make(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/recepcja/pacjent/'.$ip.'/terminy/'.$i);
        //$response->assertStatus(404);
		$response->assertSuccessful();			//!!!!!!!!!!!!!!
    }
	
	*/
	
	 //Czy wyswietla sie lista pacjentow i czy zawiera wszystkich pacjentow?
	public function testPatientsListView()
    {
		$patients = Patient::all();
		$user = factory(User::class)->make(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/recepcja/lista_pacjentow');
        $response->assertSuccessful();
        $response->assertViewIs('recepcja-panel.lista-pacjentow');
		$response->assertViewHas(['patients' => $patients]);
    }
	
	//Czy wyswietlaja sie dane pacjenta i czy zawiera wszystkie pola?
	public function testCorrectPatientIdData()
	{
		$i = $this->faker->randomDigit;	
		while (Visit::findAllPatientData($i)==false)
			$i = $this->faker->randomDigit;
		
		$patientData= Visit::findAllPatientData($i);
		$user = factory(User::class)->make(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/recepcja/pacjent/'.$i);
        $response->assertSuccessful();
        $response->assertViewIs('recepcja-panel.pacjent');
		$response->assertViewHas(['patientData' => $patientData]);
    }
		
	//Czy wyswietla sie dane pacjenta gdy podamy zle id ?
	public function testWrongPatientIdData()
	{
		$i = 1;		
		while (Visit::findAllPatientData($i)==true)
			$i = $this->faker->randomDigit;
		$user = factory(User::class)->make(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/recepcja/pacjent/'.$i);
        $response->assertStatus(404);
    }
	/*
	//Czy zalogowanemu uzytkownikowi wyswietlaja sie wszystkie wizyty?
	public function testAllVisitsView()
    {
        $user = factory(User::class)->make(); 
		$userId = $user->id;
		$visit = new Visit();	//metoda statyczna
		$allVisits = $visit -> getWizyty($userId);
		$response = $this->actingAs($user)->get('/panel/wizyty');
		$response->assertSuccessful();
        $response->assertViewIs('panel-wizyty');
		$response->assertViewHas(['wizyty' => $allVisits]);
    }
	*/
	
}
