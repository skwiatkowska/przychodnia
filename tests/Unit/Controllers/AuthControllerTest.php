<?php

namespace Tests\Unit\Controllers;

use Tests\TestCase;
use App\User;
use App\Patient;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * 
 * @group authcont   
 */
class AuthControllerTest extends TestCase
{

	public function testFormView()
    {
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertViewIs('login-form');
    }
	
	public function testFormViewAuthenticatedUser()
    {
        $user = factory(User::class)->make(); 
		$response = $this->actingAs($user)->get('/login');
		$response->assertStatus(500); 
    }
	
	
	public function testLoginPatientCorrect()
	{
		$data = array(
        'email' => 'test@test.test',
        'password' => 'test',
        'user_type' => 'patient');
	
		$response = $this -> post('/login', $data);
		$response->assertRedirect('/');
		$response->assertSessionHas('info','Zalogowano poprawnie');
	}
	
	public function testLoginDoctorCorrect()
	{
		$data = array(
        'email' => 'lekarski@przychodnia.pl',
        'password' => 'lekarski',
        'user_type' => 'doctor');
	
		$response = $this -> post('/login', $data);
		$response->assertRedirect('/panel_lekarza');
		$response->assertSessionHas('info','Zalogowano poprawnie');
	}
	
	public function testLoginReceptionCorrect()
	{
		$data = array(
        'email' => 'recepcja@przychodnia.pl',
        'password' => 'admin',
        'user_type' => 'reception');
	
		$response = $this -> post('/login', $data);
		$response->assertRedirect('/recepcja');
		$response->assertSessionHas('info','Zalogowano poprawnie');
	}
	
	public function testLoginEmptyField()
	{
		$data = array(
        'email' => null,
        'password' => null,
        'user_type' => 'reception');
	
		$response = $this -> post('/login', $data);
		$response->assertRedirect('/login');
	}
	

	public function testLogout()
    {
		$user = factory(User::class)->make(); 
		$response = $this->actingAs($user)->get('/logout');
		$response->assertRedirect('/');
		$response->assertSessionHas('info','Wylogowano');
	}
	
}
