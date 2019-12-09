<?php

// NIE OK
namespace Tests\Unit\Controllers;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthControllerTest extends TestCase
{
	//use RefreshDatabase;
	
	//Czy wyswietla sie widok logowania?
	public function testLoginSiteView()
    {
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertViewIs('login-form');
    }
	
	//Czy wyswietla sie widok logowania zalogowanemu uzytkownikowi?
	public function testAuthenticatedUserLoginSiteView()
    {
        $user = factory(User::class)->make(); 	// Tworzy uwierzytelnionego Usera
		$response = $this->actingAs($user)->get('/login');
		$this->assertAuthenticated();
        $response->assertRedirect('/panel');
    }
	
	/*
	//Co sie dzieje po poprawnym zalogowaniu
	public function testAuthenticatedUserPanelSiteView()
    {
		
		//$user = factory(User::class)->make(); 	// Tworzy uwierzytelnionego Pacjenta
		$user = factory(User::class)->create([
            'password' => $password = 'password',
			'user_type' => 'pacjent'
        ]);
		$email = $user -> email;
		$response = $this->post('/login',[$email, $password,'user-type' => 'patient']);
		//$response->assertSuccessful();
		$response->assertRedirect('/panel');
		//$this->assertAuthenticatedAs($user);
	}
	*/
	//Co sie dzieje po niepoprawnym zalogowaniu
	/*
	//co sie dzieje przy wylogowywaniu
	public function testLogout()
    {
		$user = factory(User::class)->make(); 	// Tworzy uwierzytelnionego Pacjenta
		$response = $this->actingAs($user)->post('/logout');
		$response->assertSuccessful();
		$response->assertRedirect('/');
	}
	*/
}
