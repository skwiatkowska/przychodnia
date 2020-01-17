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

/**
 * 
 * @group reccont
 */
class ReceptionControllerTest extends TestCase
{
	use WithFaker;
	
	public function testMainSiteNotAuthenticated()
    {
		$response = $this->get('/recepcja');
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}
	
	public function testMainSiteReception()
    {
        $user = factory(User::class)->make(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/recepcja');
		$response->assertSuccessful();
        $response->assertViewIs('recepcja-panel.recepcja');
    }	
	
	public function testMainSiteOtherUser()
    {
		$user = factory(User::class)->make(['user_type' => 'patient',]); 
		$response = $this->get('/recepcja');
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}	
	
	
	
	public function testPatientRegisterFormViewNotAuthenticated()
    {
		$response = $this->get('/recepcja/dodaj_pacjenta');
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}
	
	public function testPatientRegisterFormViewReception()
    {
        $user = factory(User::class)->create(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/recepcja/dodaj_pacjenta');
		$response->assertSuccessful();
        $response->assertViewIs('.recepcja-panel.dodaj-pacjenta');
    }	
	
	public function testPatientRegisterFormViewOtherUser()
    {
		$user = factory(User::class)->create(['user_type' => 'doctor',]); 
		$response = $this->actingAs($user)->get('/recepcja/dodaj_pacjenta');
		$response->assertRedirect('/');
		$response->assertSessionHas('info','Strona niedostępna!');
	}	
	
	
	
	
	public function testDisablePatientAccountNotAuthenticated()
    {
		$id = 2;
		$response = $this->post('/recepcja/pacjent/'.$id.'/ustawienia/dezaktywuj');
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}
	
	public function testDisablePatientAccountReception()
    {
		$id = 2;
		$user = factory(User::class)->create(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->post('/recepcja/pacjent/'.$id.'/ustawienia/dezaktywuj');
		$response->assertRedirect('/recepcja/pacjent/'.$id);
		$response->assertSessionHas('info','Konto zostało zdezaktywowane.');
	}
	
	public function testDisablePatientAccountOtherUser()
    {
		$id = 2;
		$user = factory(User::class)->create(['user_type' => 'doctor',]);  
		$response = $this->actingAs($user)->post('/recepcja/pacjent/'.$id.'/ustawienia/dezaktywuj');
		$response->assertRedirect('/');
		$response->assertSessionHas('info','Strona niedostępna!');
	}
	
	
	
	
	public function testEnablePatientAccountNotAuthenticated()
    {
		$id = 2;
		$response = $this->post('/recepcja/pacjent/'.$id.'/ustawienia/aktywuj');
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}
	
	public function testEnablePatientAccountReception()
    {
		$id = 2;
		$user = factory(User::class)->create(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->post('/recepcja/pacjent/'.$id.'/ustawienia/aktywuj');
		$response->assertRedirect('/recepcja/pacjent/'.$id);
		$response->assertSessionHas('info','Konto zostało aktywowane.');
	}

	public function testEnablePatientAccountOtherUser()
    {
		$id = 2;
		$user = factory(User::class)->create(['user_type' => 'doctor',]);  
		$response = $this->actingAs($user)->post('/recepcja/pacjent/'.$id.'/ustawienia/aktywuj');
		$response->assertRedirect('/');
		$response->assertSessionHas('info','Strona niedostępna!');
	}
	
	
	

	public function testPatientRegisterNotAuthenticated()
    {
		$response = $this->post('/recepcja/dodaj_pacjenta');
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}
	
	public function testPatientRegisterReception()
    {
		
		$patient = array(
			'imie' => $imie = $this->faker->name,
			'nazwisko' => $this->faker->lastname,		
			'email' => $email = $this->faker->unique()->safeEmail,		
			'pesel' => $this->faker->numberBetween(100000000000,99999999999),
			'adres' => $this->faker->address,
            'haslo' => $this->faker->password(8),
			'phone' => $this->faker->numberBetween(100000000,999999999),
			'data_urodzenia' => $this->faker->date	
		);	
		
		$user = factory(User::class)->make(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->post('/recepcja/dodaj_pacjenta', $patient);
	
        $response->assertRedirect('recepcja/lista_pacjentow');
		$response->assertSessionHas('info','Konto zostało zarejestrowane');
		$this->assertDatabaseHas('users', [
			'name' => $imie,
			'email' => $email
		]);
	}
	
	
	
	
	public function testDoctorRegisterFormViewNotAuthenticated()
    {
		$response = $this->get('/recepcja/dodaj_lekarza');
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}
	
	public function testdoctorRegisterFormViewReception()
    {
        $user = factory(User::class)->create(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/recepcja/dodaj_lekarza');
		$response->assertSuccessful();
        $response->assertViewIs('recepcja-panel.dodaj-lekarza');
    }	
	
	public function testdoctorRegisterFormViewOtherUser()
    {
		$user = factory(User::class)->create(['user_type' => 'doctor',]); 
		$response = $this->actingAs($user)->get('/recepcja/dodaj_lekarza');
		$response->assertRedirect('/');
		$response->assertSessionHas('info','Strona niedostępna!');
	}
	
	
	
	public function testDoctorRegisterNotAuthenticated()
    {
		$response = $this->post('/recepcja/dodaj_lekarza');
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}
	
	public function testDoctorRegisterReception()
    {
		
		$doctor = array(
			'imie' => $imie =$this->faker->name,
			'nazwisko' => $this->faker->lastname,
			'email' => $email = $this->faker->unique()->safeEmail,
			'tytul' => $this->faker->word,
			'specjalizacja' => $this->faker->word,
			'gabinet' => $this->faker->randomDigit ,
			'haslo' => $this->faker->password(8),
			'phone' => $this->faker->numberBetween(100000000,999999999)	
		);	
		
		$user = factory(User::class)->make(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->post('/recepcja/dodaj_lekarza', $doctor);
	
        $response->assertRedirect('recepcja/lista_lekarzy');
		$response->assertSessionHas('info','Konto zostało zarejestrowane');
		$this->assertDatabaseHas('users', [
			'name' => $imie,
			'email' => $email
		]);
	}



	public function testDoctorListNotAuthenticated()
    {
		$response = $this->get('/recepcja/lista_lekarzy');
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}
	
	public function testDoctorsListReception()
    {
		$user = factory(User::class)->create(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/recepcja/lista_lekarzy');
        $response->assertSuccessful();
        $response->assertViewIs('recepcja-panel.lista-lekarzy');
		$response->assertViewHas(['doctors' => Doctor::orderBy('nazwisko','asc')->get()]);
    }	
	public function testDoctorsListOtherUser()
    {
		$user = factory(User::class)->create(['user_type' => 'doctor',]); 
		$response = $this->actingAs($user)->get('/recepcja/lista_lekarzy');
		$response->assertRedirect('/');
		$response->assertSessionHas('info','Strona niedostępna!');
	}
	
	
	
	
	public function testDoctorListForVisitsNotAuthenticated()
    {
		$response = $this->get('/recepcja/wizyty');
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}
	
	public function testDoctorListForVisitsReception()
    {
		$user = factory(User::class)->create(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/recepcja/wizyty');
        $response->assertSuccessful();
        $response->assertViewIs('recepcja-panel.wizyty-start');
		$response->assertViewHas(['doctors' => Doctor::orderBy('nazwisko','asc')->get()]);
    }	
	
	public function testDoctorListForVisitsOtherUser()
    {
		$user = factory(User::class)->create(['user_type' => 'doctor',]); 
		$response = $this->actingAs($user)->get('/recepcja/wizyty');
		$response->assertRedirect('/');
		$response->assertSessionHas('info','Strona niedostępna!');
	}
	
	
	
	
	public function testDoctorListAndVisitsNotAuthenticated()
    {
		$id = 1;
		$response = $this->get('/recepcja/wizyty/'.$id);
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}
	
	public function testDoctorListAndVisitsReception()
    {
		$id = 1;
		$user = factory(User::class)->create(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/recepcja/wizyty/'.$id);
        $response->assertSuccessful();
        $response->assertViewIs('recepcja-panel.wizyty');
		$response->assertViewHas(['doctors' => Doctor::orderBy('nazwisko','asc')->get()]);
		$response->assertViewHas(['doctorData' => Visit::findAllDoctorData($id)]);
		$response->assertViewHas(['doctorVisits' => Deadline::findDoctorAllDeadlines($id)]);
    }	
	
	public function testDoctorListAndVisitsOtherUser()
    {
		$id = 1;
		$user = factory(User::class)->create(['user_type' => 'doctor',]); 
		$response = $this->actingAs($user)->get('/recepcja/wizyty/'.$id);
		$response->assertRedirect('/');
		$response->assertSessionHas('info','Strona niedostępna!');
	}
	
	
	
	
	public function testDoctorListForAPatientNotAuthenticated()
    {
		$id = 2;
		$response = $this->get('/recepcja/pacjent/'.$id.'/nowa_wizyta');
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}
	
	public function testDoctorListForAPatientReception()
    {
		$id = 2;
		$user = factory(User::class)->create(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/recepcja/pacjent/'.$id.'/nowa_wizyta');
        $response->assertSuccessful();
        $response->assertViewIs('recepcja-panel.nowa-wizyta');
		$response->assertViewHas(['doctors' => Doctor::orderBy('nazwisko','asc')->get()]);
    }
	
	public function testDoctorListForAPatientOtherUser()
    {
		$id = 2;
		$user = factory(User::class)->create(['user_type' => 'doctor',]); 
		$response = $this->actingAs($user)->get('/recepcja/pacjent/'.$id.'/nowa_wizyta');
		$response->assertRedirect('/');
		$response->assertSessionHas('info','Strona niedostępna!');
	}
	
	
	
	
	public function testDoctorDeadlinesForAPatientNotAuthenticated()
    {
		$id_pac = 2;
		$id_doc = 2;
		$response = $this->get('/recepcja/pacjent/'.$id_pac.'/terminy/'.$id_doc);
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}
	
	public function testDoctorDeadlinesForAPatientReception()
    {
		$id_pac = 2;
		$id_doc = 2;
		$user = factory(User::class)->create(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/recepcja/pacjent/'.$id_pac.'/terminy/'.$id_doc);
        $response->assertSuccessful();
        $response->assertViewIs('recepcja-panel.nowa-wizyta-terminy');
		$response->assertViewHas(['doctorsDeadlines' => Deadline::findDoctorFreeDeadlines($id_doc)]);
    }
	
	public function testDoctorDeadlinesForAPatientOtherUser()
    {
		$id_pac = 2;
		$id_doc = 2;
		$user = factory(User::class)->create(['user_type' => 'doctor',]); 
		$response = $this->actingAs($user)->get('/recepcja/pacjent/'.$id_pac.'/terminy/'.$id_doc);
		$response->assertRedirect('/');
		$response->assertSessionHas('info','Strona niedostępna!');
	}
	
	
	
	/*
	public function testDoctorsDeadlinesNotAuthenticated()
    {
		$id_pac = 2;
		$id_doc = 2;
		$response = $this->get('/recepcja/pacjent/'.$id_pac.'/terminy/'.$id_doc);
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}
	
	public function testCorrectDoctorIdDeadlines()
	{
		$i = $this->faker->randomDigit;	
		while (Deadline::findDoctorFreeDeadlines($i)==false)
			$i = $this->faker->randomDigit;
		
		$doctorsDeadlines = Deadline::findDoctorFreeDeadlines($i);
		$user = factory(User::class)->make(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/recepcja/lekarz/'.$i);
        $response->assertSuccessful();
        $response->assertViewIs('recepcja-panel.lekarz');
		//$response->assertViewHas(['doctorsDeadlines' => $doctorsDeadlines]);
		//!!!!!!!!!!!!!!
    }
	
	//Czy wyswietli sie terminarz gdy podamy zle id lekarza?
	public function testWrongDoctorIdDeadlines()
	{
		$i = 1;		
		while (Deadline::findDoctorFreeDeadlines($i)==true)
			$i = $this->faker->randomDigit;
		$user = factory(User::class)->make(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/recepcja/lekarz/'.$i);
        $response->assertStatus(500);
    }*/


	
	
	public function testPatientListNotAuthenticated()
    {
		$response = $this->get('/recepcja/lista_pacjentow');
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}
	
	public function testPatientsListReception()
    {
		$patients = Patient::all();
		$user = factory(User::class)->create(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/recepcja/lista_pacjentow');
        $response->assertSuccessful();
        $response->assertViewIs('recepcja-panel.lista-pacjentow');
		$response->assertViewHas(['patients' => Patient::orderBy('nazwisko','asc')->get()]);
    }
	
	public function testPatientListOtherUser()
    {
		$user = factory(User::class)->create(['user_type' => 'doctor',]); 
		$response = $this->actingAs($user)->get('/recepcja/lista_pacjentow');
		$response->assertRedirect('/');
		$response->assertSessionHas('info','Strona niedostępna!');
	}
	
	
	
	public function testPatientDataNotAuthenticated()
    {
		$id = 2;
		$response = $this->get('/recepcja/pacjent/'.$id);
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}
	
	public function testPatientDataReceptionCorrectId()
	{
		$id = 2;
		$user = factory(User::class)->create(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/recepcja/pacjent/'.$id);
        $response->assertSuccessful();
        $response->assertViewIs('recepcja-panel.pacjent');
    }
		
	public function testPatientDataReceptionWrongId()
	{
		$i = 0;		
		$user = factory(User::class)->create(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/recepcja/pacjent/'.$i);
        $response->assertStatus(500);
    }
	
	public function testPatientDataOtherUser()
    {
		$id = 2;
		$user = factory(User::class)->create(['user_type' => 'doctor',]); 
		$response = $this->actingAs($user)->get('/recepcja/pacjent/'.$id);
		$response->assertRedirect('/');
		$response->assertSessionHas('info','Strona niedostępna!');
	}
	
	
	
	
	public function testPatientSettingsNotAuthenticated()
    {
		$id = 2;
		$response = $this->get('/recepcja/pacjent/'.$id.'/ustawienia');
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}
	
	public function testPatientSettingsCorrectId()
	{
		$id = 2;
		$user = factory(User::class)->create(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/recepcja/pacjent/'.$id.'/ustawienia');
        $response->assertSuccessful();
        $response->assertViewIs('recepcja-panel.pacjent-ustawienia');
		$response->assertViewHas(['patientData' => Visit::findAllPatientData($id)]);
    }
		
	public function testPatientSettingsWrongId()
	{
		$i = 0;		
		$user = factory(User::class)->create(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/recepcja/pacjent/'.$i.'/ustawienia');
        $response->assertStatus(404);
    }
	
	public function testPatientSettingsOtherUser()
    {
		$id = 2;
		$user = factory(User::class)->create(['user_type' => 'doctor',]); 
		$response = $this->actingAs($user)->get('/recepcja/pacjent/'.$id.'/ustawienia');
		$response->assertRedirect('/');
		$response->assertSessionHas('info','Strona niedostępna!');
	}
	
	
	
	
	public function testDoctorSettingsNotAuthenticated()
    {
		$id = 2;
		$response = $this->get('/recepcja/lekarz/'.$id.'/ustawienia');
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}
	
	public function testDoctorSettingsCorrectId()
	{
		$id = 2;
		$user = factory(User::class)->create(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/recepcja/lekarz/'.$id.'/ustawienia');
        $response->assertSuccessful();
        $response->assertViewIs('recepcja-panel.lekarz-ustawienia');
		$response->assertViewHas(['doctorData' => Visit::findAllDoctorData($id)]);
    }
		
	public function testDoctorSettingsWrongId()
	{
		$i = 0;		
		$user = factory(User::class)->create(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/recepcja/lekarz/'.$i.'/ustawienia');
        $response->assertStatus(404);
    }
	
	public function testDoctorSettingsOtherUser()
    {
		$id = 2;
		$user = factory(User::class)->create(['user_type' => 'doctor',]); 
		$response = $this->actingAs($user)->get('/recepcja/lekarz/'.$id.'/ustawienia');
		$response->assertRedirect('/');
		$response->assertSessionHas('info','Strona niedostępna!');
	}
	
	
	
	
	public function testDoctorDataNotAuthenticated()
    {
		$id = 2;
		$response = $this->get('/recepcja/lekarz/'.$id);
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}
	
	public function testDoctorDataReceptionCorrectId()
	{
		$id = 2;
		$user = factory(User::class)->create(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/recepcja/lekarz/'.$id);
        $response->assertSuccessful();
        $response->assertViewIs('recepcja-panel.lekarz');
    }
		
	public function testDoctorDataReceptionWrongId()
	{
		$i = 0;		
		$user = factory(User::class)->create(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/recepcja/lekarz/'.$i);
        $response->assertStatus(500);
    }
	
	public function testDoctorDataOtherUser()
    {
		$id = 2;
		$user = factory(User::class)->create(['user_type' => 'doctor',]); 
		$response = $this->actingAs($user)->get('/recepcja/lekarz/'.$id);
		$response->assertRedirect('/');
		$response->assertSessionHas('info','Strona niedostępna!');
	}
	
	
	
	public function testChangePatientDataNotAuthenticated()
    {
		$data = array(
        'imie' => null,
        'nazwisko' => null,
        'email' => null,
		'pesel' => null,
		'adres' => null,
		'phone' => null,
		'data_urodzenia' => null);
		
		$id = 3;
		$response = $this -> post('/recepcja/pacjent/'.$id.'/ustawienia/zmien_dane', $data);
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}
	
	public function testChangePatientDataReception()
    {
		$data = array(
        'imie' => 'Zola',
        'nazwisko' => null,
        'email' => null,
		'pesel' => null,
		'adres' => null,
		'phone' => null,
		'data_urodzenia' => null);
		
		$id_pac = 3;
		$user = factory(User::class)->make(['id' => 6,]);
		$response = $this -> actingAs($user) -> post('/recepcja/pacjent/'.$id_pac.'/ustawienia/zmien_dane', $data);
		$response->assertRedirect('/recepcja/pacjent/'.$id_pac);
		$response->assertSessionHas('info','Dane zostały zmienione');
	}
	
	
	
	public function testChangePatientPasswordNotAuthenticated()
    {
		$data = array(
        'haslo' => null,
        'haslo1' => null);
		$id_pac = 3;
		$response = $this -> post('/recepcja/pacjent/'.$id_pac.'/ustawienia/zmien_haslo', $data);
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}

	public function testChangePatientPasswordPatient()
    {
		$data = array(
        'haslo1' => null,
        'haslo2' => null);
		$id_pac = 3;
		$user = factory(User::class)->make(['id' => 6,]);
		$response = $this -> actingAs($user) -> post('/recepcja/pacjent/'.$id_pac.'/ustawienia/zmien_haslo', $data);
		$response->assertRedirect('/recepcja/pacjent/'.$id_pac);
		$response->assertSessionHas('info','Hasło zostało zmienione');
	}
	
	
	
	
	public function testChangeDoctorDataNotAuthenticated()
    {
		$data = array(
        'imie' => null,
        'nazwisko' => null,
        'tytul' => null,
		'email' => null,
		'specjalizacja' => null,
		'phone' => null,
		'gabinet' => null);
		
		$id = 3;
		$response = $this -> post('/recepcja/lekarz/'.$id.'/ustawienia/zmien_dane', $data);
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}
	
	public function testChangeDoctorDataReception()
    {
		$data = array(
        'imie' => 'Zola',
        'nazwisko' => null,
        'tytul' => null,
		'email' => null,
		'specjalizacja' => null,
		'phone' => null,
		'gabinet' => null);
		
		$id_doc = 3;
		$user = factory(User::class)->make(['id' => 6,]);
		$response = $this -> actingAs($user) -> post('/recepcja/lekarz/'.$id_doc.'/ustawienia/zmien_dane', $data);
		$response->assertRedirect('/recepcja/lekarz/'.$id_doc);
		$response->assertSessionHas('info','Dane zostały zmienione');
	}
	
	
	
	public function testChangeDoctorPasswordNotAuthenticated()
    {
		$data = array(
        'haslo' => null,
        'haslo1' => null);
		$id_doc = 3;
		$response = $this -> post('/recepcja/lekarz/'.$id_doc.'/ustawienia/zmien_haslo', $data);
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}

	public function testChangeDoctorPasswordPatient()
    {
		$data = array(
        'haslo1' => null,
        'haslo2' => null);
		$id_doc = 3;
		$user = factory(User::class)->make(['id' => 6,]);
		$response = $this -> actingAs($user) -> post('/recepcja/lekarz/'.$id_doc.'/ustawienia/zmien_haslo', $data);
		$response->assertRedirect('/recepcja/lekarz/'.$id_doc);
		$response->assertSessionHas('info','Hasło zostało zmienione');
	}
	
	
	
	
	public function testDisableDoctorAccountNotAuthenticated()
    {
		$id = 2;
		$response = $this->post('/recepcja/lekarz/'.$id.'/ustawienia/dezaktywuj');
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}
	
	public function testDisableDoctorAccountReception()
    {
		$id = 2;
		$user = factory(User::class)->create(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->post('/recepcja/lekarz/'.$id.'/ustawienia/dezaktywuj');
		$response->assertRedirect('/recepcja/lekarz/'.$id);
		$response->assertSessionHas('info','Konto zostało zdezaktywowane.');
	}
	
	public function testDisableDoctorAccountOtherUser()
    {
		$id = 2;
		$user = factory(User::class)->create(['user_type' => 'doctor',]);  
		$response = $this->actingAs($user)->post('/recepcja/lekarz/'.$id.'/ustawienia/dezaktywuj');
		$response->assertRedirect('/');
		$response->assertSessionHas('info','Strona niedostępna!');
	}
	
	
	
	
	public function testEnableDoctorAccountNotAuthenticated()
    {
		$id = 2;
		$response = $this->post('/recepcja/lekarz/'.$id.'/ustawienia/aktywuj');
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}
	
	public function testEnableDoctorAccountReception()
    {
		$id = 2;
		$user = factory(User::class)->create(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->post('/recepcja/lekarz/'.$id.'/ustawienia/aktywuj');
		$response->assertRedirect('/recepcja/lekarz/'.$id);
		$response->assertSessionHas('info','Konto zostało aktywowane.');
	}
	
	public function testEnableDoctorAccountOtherUser()
    {
		$id = 2;
		$user = factory(User::class)->create(['user_type' => 'doctor',]);  
		$response = $this->actingAs($user)->post('/recepcja/lekarz/'.$id.'/ustawienia/aktywuj');
		$response->assertRedirect('/');
		$response->assertSessionHas('info','Strona niedostępna!');
	}
	/*
	public function testAllVisitsNotAuthenticated()
    {
		$response = $this->get('/recepcja/pacjent/'.$id);
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}
	
	public function testAllVisitsView()
    {
        $user = factory(User::class)->make(['user_type' => 'reception',]); 
		//$userId = $user->id;
		$visit = new Visit();	//metoda statyczna
		//$allVisits = $visit -> getWizyty($userId);
		$allVisits = $visit ->getAllVisits();
		$response = $this->actingAs($user)->get('/panel/wizyty');
		$response->assertSuccessful();
        $response->assertViewIs('recepcja-panel.wizyty');
		$response->assertViewHas(['visits' => $allVisits]);
    }
	*/
	
	

	
}
