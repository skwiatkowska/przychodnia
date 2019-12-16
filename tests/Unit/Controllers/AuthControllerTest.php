<?php

// NIE OK
namespace Tests\Unit\Controllers;

use Tests\TestCase;
use App\User;
use App\Patient;
//use App\Controllers\AuthController;
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
	
	
	//Czy wyswietla sie widok logowania zalogowanemu uzytkownikowi ?
	public function testAuthenticatedUserLoginSiteView()
    {
        $user = factory(User::class)->make(); 	// Tworzy uwierzytelnionego Usera
		$response = $this->actingAs($user)->get('/login');
		$response->assertStatus(500); //???
    }
	
	/*
	//Co sie dzieje po poprawnym zalogowaniu uzytkownika 'pacjent'
	public function testAuthenticatedUserPanelSiteView()
    {
		
		//$user = factory(User::class)->make(); 	// Tworzy uwierzytelnionego Pacjenta
		$user = factory(Patient::class)->create([
            'password' => $password = 'password',
			//'user_type' => 'patient'
        ]);
		$email = $user -> email;
		$response = $this->post('/login',['email'=>$email, 'password'=>$password]);
		//$response->assertSuccessful();
		$response->assertRedirect('/');
		//$this->assertAuthenticatedAs($user);
	}
	*/
	//Co sie dzieje po niepoprawnym zalogowaniu
	/*
	//co sie dzieje przy wylogowywaniu
	public function testLogout()
    {
		$user = factory(User::class)->make(); 	// Tworzy uwierzytelnionego Pacjenta
		$response = $this->actingAs($user)->AuthController::logout();
		$response->assertSuccessful();
		$response->assertRedirect('/');
	}
	*/
	/*
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
         Nie mozna uzyc factory, bo klasa Patient ukrywa haslo
		$user = factory(Patient::class)->create([
            'password' => bcrypt($password = 'i-love-laravel'),
        ]);		
        $response = $this->post('/rejestracja',//$user->toArray());
		[           
			'imie' => $user->imie,
			'nazwisko' => $user->nazwisko,
			'email' => $user->email,
			'pesel' => $user->pesel,
            'haslo' => $user->$password
        ]);
		
		$response = $this->post('/rejestracja', $patient);
		
		//$patient = factory(Patient::class)->create(['password' => bcrypt($password = 'i-love-laravel')]);
		//$response = $this->post('/rejestracja', [$patient->toArray(),'haslo' =>$password]);
		
		$this->assertDatabaseHas('patients', [
			'imie' => $imie,//$patient->imie,
			'email' => $email//$patient->email
		]);
		$this->assertDatabaseHas('users', [
			'name' => $imie,//$patient->imie,
			'email' => $email//$patient->email
		]);
        $response->assertRedirect('/login');
		
		
		
		
		//$user = User::where('email', $email)->where('name', $imie)->first();
		//$this->assertNotNull($user);

		//$this->assertAuthenticatedAs($user);
	}*/
}
