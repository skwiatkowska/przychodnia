<?php

namespace Tests\Unit\Controllers;

use Tests\TestCase;
use App\Patient;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * 
 * @group patcont   
 */
class PatientControllerTest extends TestCase
{
	
	public function testMainSiteNotAuthenticatedUser()
    {
		$response = $this->get('/panel');
		$response->assertRedirect('/login');
	}
		
	public function testMainSitePatient()
    {
        $user = factory(User::class)->make(['user_type' => 'patient',]); 
		$response = $this->actingAs($user)->get('/panel');
		$response->assertSuccessful();
        $response->assertViewIs('pacjent-panel.panel');
    }
	
	public function testMainSiteOtherUser()
    {
        $user = factory(User::class)->make(['user_type' => 'doctor',]);
		$response = $this->actingAs($user)->get('/panel');		
		$response->assertSuccessful();			
    }
	
	
	

	public function testSettingsNotAuthenticatedUser()
    {
		$response = $this->get('/panel/ustawienia');
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}
		
	public function testSettingsPatient()
    {
        $user = factory(User::class)->create(['user_type' => 'patient',]); 
		$response = $this->actingAs($user)->get('/panel/ustawienia');
		$response->assertSuccessful();
        $response->assertViewIs('pacjent-panel.panel-ustawienia');
		
    }
	
	public function testSettingsOtherUser()
    {
        $user = factory(User::class)->create(['user_type' => 'doctor',]); 
		$response = $this->actingAs($user)->get('/panel/ustawienia');
		$response->assertRedirect('/');
		$response->assertSessionHas('info','Strona niedostępna!');			
		
    }
	
	

	public function testPatientInfoNotAuthenticated()
    {
		$response = $this->get('/panel/dane');
		$response->assertRedirect('/login');
	}
		
	public function testPatientInfoPatient()
    {
        $user = factory(User::class)->make(['id' => 4,'user_type' => 'patient',]); 
		$response = $this->actingAs($user)->get('/panel/dane');
		$response->assertSuccessful();
        $response->assertViewIs('pacjent-panel.panel-dane');

    }
	
	public function testPatientInfoOtherUser()
    {
        $user = factory(User::class)->create(['user_type' => 'doctor',]); 
		$response = $this->actingAs($user)->get('/panel/dane');
		$response->assertRedirect('/');
		$response->assertSessionHas('info','Strona niedostępna!');				
    }
	
	
	
	public function testChangeDataNotAuthenticated()
    {
		$data = array(
        'imie' => null,
        'nazwisko' => null,
        'email' => null,
		'pesel' => null,
		'adres' => null,
		'phone' => null,
		'data_urodzenia' => null);
	
		$response = $this -> post('/panel/ustawienia/zmien_dane', $data);
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}
	
	public function testChangeDataPatient()
    {
		$data = array(
        'imie' => 'Zola',
        'nazwisko' => null,
        'email' => null,
		'pesel' => null,
		'adres' => null,
		'phone' => null,
		'data_urodzenia' => null);
		$user = factory(User::class)->make(['id' => 6,]);
		$response = $this -> actingAs($user) -> post('/panel/ustawienia/zmien_dane', $data);
		$response->assertRedirect('/panel/dane');
		$response->assertSessionHas('info','Dane zostały zmienione');
	}
	
	
	public function testChangePasswordNotAuthenticated()
    {
		$data = array(
        'haslo' => null,
        'haslo1' => null,
        'haslo2' => null);
	
		$response = $this -> post('/panel/ustawienia/zmien_haslo', $data);
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}

	public function testChangePasswordPatient()
    {
		$data = array(
        'haslo' => null,
        'haslo1' => null,
        'haslo2' => null);
	
		$user = factory(User::class)->make(['id' => 6,]);
		$response = $this -> actingAs($user) -> post('/panel/ustawienia/zmien_haslo', $data);
		$response->assertRedirect('/panel/dane');
		$response->assertSessionHas('info','Hasło zostało zmienione');
	}
	
	
	public function testDisableAccountNotAuthenticated()
    {
		$data = array('haslo' => 'xx');
		$response = $this->post('/panel/ustawienia/dezaktywuj',$data);
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}
	
	public function testDisableAccountPatient()
    {
		$data = array('haslo' => 'test');
		$user = factory(User::class)->make(['id' => 12,]);
		$response = $this -> actingAs($user) -> post('/panel/ustawienia/dezaktywuj',$data);
		$response->assertRedirect('/logout');
		$response->assertSessionHas('info','Wybrane konto zostało zdezaktywowane');
		$user = User::where('id',12)->first();
		$user -> activateUser(12);
	}
	
	public function testDisableAccountOtherUser()
    {
		$data = array('haslo' => 'test');
		$user = factory(User::class)->create(['user_type' => 'doctor',]); 
		$response = $this -> actingAs($user) -> post('/panel/ustawienia/dezaktywuj',$data);
		$response->assertRedirect('/');
		$response->assertSessionHas('info','Strona niedostępna!');	
	}
}
