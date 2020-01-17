<?php

namespace Tests\Unit\Controllers;

use Tests\TestCase;
use App\Patient;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * 
 * @group regcont
 */
class RegisterControllerTest extends TestCase
{
	use WithFaker;
	
	public function testFormView()
    {
        $response = $this->get('/rejestracja');
        $response->assertSuccessful();
        $response->assertViewIs('rejestracja');
    }
	


	public function testRegisterCorrectData()
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
	
		$response = $this->post('/rejestracja', $patient);
		
		$this->assertDatabaseHas('patients', [
			'imie' => $imie,
			'email' => $email
		]);
		$this->assertDatabaseHas('users', [
			'name' => $imie,
			'email' => $email
		]);
        $response->assertRedirect('/login');
		$response->assertSessionHas('info','Konto zostało zarejestrowane');
	}
	
	public function testRegisterIncorrectData()
    {
		
		$patient = array(
			'imie' => $imie = $this->faker->name,
			'nazwisko' => $this->faker->lastname,		
			'email' => null,		
			'pesel' => $this->faker->numberBetween(100000000000,99999999999),
			'adres' => $this->faker->address,
            'haslo' => $this->faker->password(8),
			'phone' => $this->faker->numberBetween(100000000,999999999),
			'data_urodzenia' => $this->faker->date	
		);	
	
		$response = $this->post('/rejestracja', $patient);
        $response->assertRedirect('/rejestracja');
	}
	
}
