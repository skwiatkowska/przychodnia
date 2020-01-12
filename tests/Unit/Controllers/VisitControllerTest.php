<?php

// NIE OK

namespace Tests\Unit\Controllers;

use Tests\TestCase;
use App\User;
use App\Visit;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VisitsControllerTest extends TestCase
{
	//Czy niezalogowanemu uzytkownikowi wyswietla sie widok wizyt?
	public function testNotAuthenticatedUserVisitsSiteView()
    {
		$response = $this->get('/panel/wizyty');
		$response->assertRedirect('/login');
	}
	
	
	//Czy zalogowanemu uzytkownikowi wyswietla sie widok wizyt?
	public function testVisitsSiteView()
    {
        $user = factory(User::class)->make(); 
		$response = $this->actingAs($user)->get('/panel/wizyty');
		$response->assertSuccessful();
        $response->assertViewIs('pacjent-panel.panel-wizyty');
    }
	
	//Czy zalogowanemu uzytkownikowi wyswietlaja sie wszystkie wizyty?
	public function testAllVisitsView()
    {
        $user = factory(User::class)->make(); 
		$userId = $user->id;
		//$visit = new Visit();	//metoda statyczna
		//$allVisits = $visit -> getWizyty($userId);
		$response = $this->actingAs($user)->get('/panel/wizyty');
		$response->assertSuccessful();
        $response->assertViewIs('pacjent-panel.panel-wizyty');
		//$response->assertViewHas(['wizyty' => $allVisits]);
    }
	/*
	public function testNotAuthenticatedUserAddVisit()
	{
		$visit = new Visit();
		$this->assertFalse($visit -> addVisit(4, 1, '2019-12-27', '8:00'));		
	}*/
	/**
     *@group visit
     */
	 /*
	public function testAuthenticatedUserAddVisit()
	{
		$user = factory(User::class)->make(['user_type' => 'patient',]);
		$response = $this->actingAs($user)->post('/terminy/1',[1,'2019-12-27', '8:00']);
		$response->assertRedirect('/panel/wizyty');		
	}*/
	
}
