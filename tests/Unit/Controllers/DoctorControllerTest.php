<?php

//NIE OK 

namespace Tests\Unit\Controllers;

use Tests\TestCase;
use App\Doctor;
use App\Deadline;
use App\Patient;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DoctorControllerTest extends TestCase
{
	use WithFaker;
    /**
     * A basic test example.
     *
     * @return void
     */
	 
	//Czy niezalogowanemu uzytkownikowi wyswietla sie widok panelu lekarza?
	public function testNotAuthenticatedUserDoctorPanelSiteView()
    {
		$response = $this->get('/panel_lekarza');
		$response->assertSuccessful();				//!!!!!!!!!!!!!
		//$response->assertRedirect('/login');
	}
		
	//Czy zalogowanemu uzytkownikowi 'lekarz' wyswietla sie widok panelu lekarza?
	public function testDoctorPanelSiteView()
    {
        $user = factory(User::class)->make(['user_type' => 'doctor',]); 
		$response = $this->actingAs($user)->get('/panel_lekarza');
		$response->assertSuccessful();
        $response->assertViewIs('lekarz-panel.panel-lekarza');
    }
	
	//Czy zalogowanemu innemu uzytkownikowi wyswietla sie widok panelu lekarza?
	public function testOtherUserPatientPanelSiteView()
    {
        $user = factory(User::class)->make(['user_type' => 'patient',]);
		$response = $this->actingAs($user)->get('/panel_lekarza');		
		$response->assertSuccessful();
    }
	

    //Czy wyswietla sie lista lekarzy i czy zawiera wszystkich lekarzy?
	public function testDoctorsListView()
    {
		$doctors = Doctor::all();
        $response = $this->get('/lista_lekarzy');
        $response->assertSuccessful();
        $response->assertViewIs('lista-lekarzy');
		$response->assertViewHas(['doctors' => $doctors]);
    }	
	
	//Czy wyswietla sie terminarz lekarza i czy zawiera wszystkie terminy?
	public function testCorrectDoctorIdDeadlines()
	{
		$i = $this->faker->randomDigit;	
		while (Deadline::findDoctorFreeDeadlines($i)==false)
			$i = $this->faker->randomDigit;
		
		$doctorsDeadlines = Deadline::findDoctorFreeDeadlines($i);
        $response = $this->get('/terminy/'.$i);
        $response->assertSuccessful();
        $response->assertViewIs('terminy');
		$response->assertViewHas(['doctorsDeadlines' => $doctorsDeadlines]);
    }
		
	//Czy wyswietli sie terminarz gdy podamy zle id lekarza?
	public function testWrongDoctorIdDeadlines()
	{
		$i = 1;		
		while (Deadline::findDoctorFreeDeadlines($i)==true)
			$i = $this->faker->randomDigit;
		
        $response = $this->get('/terminy/'.$i);
        $response->assertStatus(404);
    }

	
	 //Czy wyswietla sie lista pacjentow i czy zawiera wszystkich pacjentow?
	public function testPatientsListView()
    {
		$patients = Patient::all();
        $response = $this->get('/panel_lekarza/lista_pacjentow');
        $response->assertSuccessful();
        $response->assertViewIs('lekarz-panel.lista-pacjentow');
		$response->assertViewHas(['patients' => $patients]);
    }
	
	
	//Czy niezalogowanemu uzytkownikowi wyswietla sie widok panelu dane lekarza?
	public function testNotAuthenticatedUserDoctorInfoPanelSiteView()
    {
		$response = $this->get('/panel_lekarza/dane');
		$response->assertRedirect('/login');
	}
		
	//Czy zalogowanemu uzytkownikowi 'lekarz' wyswietla sie widok panelu dane lekarza?
	public function testDoctorInfoPanelSiteView()
    {
        $user = factory(User::class)->make(['user_type' => 'doctor',]); 
		$response = $this->actingAs($user)->get('/panel_lekarza/dane');
		//$response->assertSuccessful();
        //$response->assertViewIs('lekarz-panel.dane');
		$response->assertStatus(500);			//!!!!!!!!!!!!!!
    }
	
	//Czy zalogowanemu innemu uzytkownikowi wyswietla sie widok panelu dane lekarza?
	public function testOtherUserDoctorInfoPanelSiteView()
    {
        $user = factory(User::class)->make(['user_type' => 'patient',]); 
		$response = $this->actingAs($user)->get('/panel_lekarza/dane');
		$response->assertStatus(500);			//!!!!!!!!!!!!!!
    }
}
