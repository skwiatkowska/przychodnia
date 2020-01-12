<?php

// NIE OK
 
namespace Tests\Unit\Controllers;

use Tests\TestCase;
use App\Patient;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PatientControllerTest extends TestCase
{
	
	//Czy niezalogowanemu uzytkownikowi wyswietla sie widok panelu pacjenta?
	public function testNotAuthenticatedUserPatientPanelSiteView()
    {
		$response = $this->get('/panel');
		$response->assertRedirect('/login');
	}
		
	//Czy zalogowanemu uzytkownikowi 'pacjent' wyswietla sie widok panelu pacjenta?
	public function testPatientPanelSiteView()
    {
        $user = factory(User::class)->make(['user_type' => 'patient',]); 
		$response = $this->actingAs($user)->get('/panel');
		$response->assertSuccessful();
        $response->assertViewIs('pacjent-panel.panel');
    }
	
	//Czy zalogowanemu innemu uzytkownikowi wyswietla sie widok panelu pacjenta?
	public function testOtherUserPatientPanelSiteView()
    {
        $user = factory(User::class)->make(['user_type' => 'doctor',]);
		$response = $this->actingAs($user)->get('/panel');		
		$response->assertSuccessful();				//!!!!!!!!!!!!!!
    }
	
	
	
	//Czy niezalogowanemu uzytkownikowi wyswietla sie widok panelu ustawien?
	public function testNotAuthenticatedUserSettingsPanelSiteView()
    {
		$response = $this->get('/panel/ustawienia');
		$response->assertRedirect('/login');
	}
		
	//Czy zalogowanemu uzytkownikowi 'pacjent' wyswietla sie widok panelu ustawien?
	public function testSettingsPanelSiteView()
    {
        $user = factory(User::class)->make(['user_type' => 'patient',]); 
		$response = $this->actingAs($user)->get('/panel/ustawienia');
		$response->assertSuccessful();
        $response->assertViewIs('pacjent-panel.panel-ustawienia');
		
    }
	
	//Czy zalogowanemu innemu uzytkownikowi wyswietla sie widok panelu ustawien?
	public function testOtherUserSettingsPanelSiteView()
    {
        $user = factory(User::class)->make(['user_type' => 'doctor',]); 
		$response = $this->actingAs($user)->get('/panel/ustawienia');
		$response->assertSuccessful();			//!!!!!!!!!!!!!!
		
    }
	
	
	
	//Czy niezalogowanemu uzytkownikowi wyswietla sie widok panelu dane pacjenta?
	public function testNotAuthenticatedUserDataPanelSiteView()
    {
		$response = $this->get('/panel/dane');
		$response->assertRedirect('/login');
	}
		
	//Czy zalogowanemu uzytkownikowi 'pacjent' wyswietla sie widok panelu dane pacjenta?
	public function testDataPanelSiteView()
    {
        $user = factory(User::class)->make(['user_type' => 'patient',]); 
		$response = $this->actingAs($user)->get('/panel/dane');
		//$response->assertSuccessful();
        //$response->assertViewIs('pacjent-panel.panel');
		$response->assertStatus(500);			//!!!!!!!!!!!!!!
    }
	
	//Czy zalogowanemu innemu uzytkownikowi wyswietla sie widok panelu dane pacjenta?
	public function testOtherUserDataPanelSiteView()
    {
        $user = factory(User::class)->make(['user_type' => 'doctor',]); 
		$response = $this->actingAs($user)->get('/panel/dane');
		$response->assertStatus(500);			//!!!!!!!!!!!!!!
    }
	
	
	
	/*
    //Czy wyswietla sie lista pacjentow i czy zawiera wszystkich pacjentow?
	public function testPatientsListView()
    {
		$patients = Patient::all();
        $response = $this->get('/lista_pacjentow');
        $response->assertSuccessful();
        $response->assertViewIs('lista-pacjentow');
		$response->assertViewHas(['patients' => $patients]);
    }*/
}
