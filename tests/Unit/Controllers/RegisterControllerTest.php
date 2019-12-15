<?php

//NIE OK -

namespace Tests\Unit\Controllers;

use Tests\TestCase;
use App\Patient;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterControllerTest extends TestCase
{
	use WithFaker;// RefreshDatabase;
    //Czy wyswietla sie widok strony rejestracji?
	public function testMainSiteView()
    {
        $response = $this->get('/rejestracja');
        $response->assertSuccessful();
        $response->assertViewIs('rejestracja');
    }
	
	// Czy uzytkownik moze sie zarejestrowac z poprawnymi danymi?
	public function testRegister()
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
        /* Nie mozna uzyc factory, bo klasa Patient ukrywa haslo
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
        ]);*/
		
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

		//$this->assertAuthenticatedAs($user);*/
	}
	
	
}
