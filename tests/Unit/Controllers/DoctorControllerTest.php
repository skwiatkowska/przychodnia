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
 * @group doccont   
 */
class DoctorControllerTest extends TestCase
{
	use WithFaker;
	 
	public function testMainSiteNotAuthenticatedUser()
    {
		$response = $this->get('/panel_lekarza');
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}
		
	public function testMainSiteDoctor()
    {
        $user = factory(User::class)->make(['user_type' => 'doctor',]); 
		$response = $this->actingAs($user)->get('/panel_lekarza');
		$response->assertSuccessful();
        $response->assertViewIs('lekarz-panel.panel-lekarza');
    }
	
	

	public function testDoctorsList()
    {
		$doctors = Doctor::orderBy('nazwisko','asc')->get();
        $response = $this->get('/lista_lekarzy');
        $response->assertSuccessful();
        $response->assertViewIs('lista-lekarzy');
		$response->assertViewHas(['doctors' => $doctors]);
    }	
	
	

	public function testDoctorsDeadlinesCorrectId()
	{
		$i = 1;
		$doctorsDeadlines = Deadline::findDoctorFreeDeadlines($i);
        $response = $this->get('/terminy/'.$i);
        $response->assertSuccessful();
        $response->assertViewIs('terminy');
		$response->assertViewHas(['doctorsDeadlines' => $doctorsDeadlines]);
    }
		
	public function testDoctorsDeadlinesWrongId()
	{
		$i = 0;
        $response = $this->get('/terminy/'.$i);
        $response->assertStatus(404);
    }


	public function testPatientsListNotAuthenticatedUser()
    {
		$response = $this->get('/panel_lekarza/lista_pacjentow');
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}
	
	public function testPatientsListDoctor()
    {
        $user = factory(User::class)->make(['id' => 8 ,'user_type' => 'doctor',]); 
		$response = $this->actingAs($user)->get('/panel_lekarza/lista_pacjentow');
		$response->assertSuccessful();
        $response->assertViewIs('lekarz-panel.lista-pacjentow');
    }
	
	public function testPatientsListOtherUser()
    {
        $user = factory(User::class)->create(['user_type' => 'patient',]); 
		$response = $this->actingAs($user)->get('/panel_lekarza/lista_pacjentow');
		$response->assertRedirect('/');
		$response->assertSessionHas('info','Strona niedostępna!');
    }
	
	

	public function testDoctorInfoNotAuthenticatedUser()
    {
		$response = $this->get('/panel_lekarza/dane');
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}
		
	public function testDoctorInfoDoctor()
    {
		$id = 8;
        $user = factory(User::class)->make(['id' => $id ,'user_type' => 'doctor',]); 
		$response = $this->actingAs($user)->get('/panel_lekarza/dane');
		$doctor = new Doctor();
		$response->assertSuccessful();
        $response->assertViewIs('lekarz-panel.dane');
		$response->assertViewHas(['data' => $doctor->getData($id)]);
    }
	
	public function testDoctorInfoOtherUser()
    {
        $user = factory(User::class)->create(['user_type' => 'patient',]); 
		$response = $this->actingAs($user)->get('/panel_lekarza/dane');
		$response->assertRedirect('/');
		$response->assertSessionHas('info','Strona niedostępna!');
	}
	
	
	public function testPatientDataNotAuthenticatedUser()
    {
		$response = $this->get('/panel_lekarza/pacjent/7');
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}
	
	public function testPatientDataDoctorCorrectPatientId()
    {
		$id_doc = 2;
		$id_pac = 5;
		$user = factory(User::class)->make(['id' => $id_doc ,'user_type' => 'doctor',]); 
		$response = $this->actingAs($user)->get('/panel_lekarza/pacjent/'.$id_pac);
		$doctor = new Doctor();
		$response->assertSuccessful();
        $response->assertViewIs('lekarz-panel.pacjent');
		$response->assertViewHas(['patientData' => Visit::findAllPatientData($id_pac)]);
		$response->assertViewHas(['doctorData' =>  $doctor->getData($id_doc)]);
	}
	
	public function testPatientDataDoctorWrongPatientId()
    {
		$id_doc = 8;
		$id_pac = 0;
		$user = factory(User::class)->make(['id' => $id_doc ,'user_type' => 'doctor',]); 
		$response = $this->actingAs($user)->get('/panel_lekarza/pacjent/'.$id_pac);
		$response->assertStatus(404);
	}
	
	public function testPatientDataOtherUser()
    {
        $user = factory(User::class)->create(['user_type' => 'patient',]); 
		$response = $this->actingAs($user)->get('/panel_lekarza/pacjent/7');
		$response->assertRedirect('/');
		$response->assertSessionHas('info','Strona niedostępna!');
	}
	
	
	
	
	public function testVisitsNotAuthenticatedUser()
    {
		$response = $this->get('/panel_lekarza/wizyty');
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}
	
	public function testVisitsDoctor()
    {
		$id = 8;
        $user = factory(User::class)->make(['id' => $id ,'user_type' => 'doctor',]); 
		$response = $this->actingAs($user)->get('/panel_lekarza/wizyty');
		$response->assertSuccessful();
        $response->assertViewIs('lekarz-panel.wizyty');
    }
	
	public function testVisitsOtherUser()
    {
        $user = factory(User::class)->create(['user_type' => 'patient',]); 
		$response = $this->actingAs($user)->get('/panel_lekarza/wizyty');
		$response->assertRedirect('/');
		$response->assertSessionHas('info','Strona niedostępna!');		
    }
	
	
	
	
	public function testAddVisitDescriptionNotAuthenticatedUser()
    {
		$data = array(
        'description' => 'desc',
        'recommendation' => 'rec');

		$id_pac = 2;
		$response = $this->get('/panel_lekarza/pacjent/'.$id_pac.'/dodaj_opis_wizyty');
		$response->assertRedirect('/login');
		$response->assertSessionHas('info','Aby przejść na wybraną stronę, musisz być zalogowany.');
	}
	
	/*
	public function testAddVisitDescriptionDoctor()
    {
		$id_doc = 2;
		$id_pac = 2;
		$data = array(
        'description' => 'desc',
        'recommendation' => 'rec');
		
        $user = factory(User::class)->make(['id' => $id_doc,]); 
		$response = $this->actingAs($user)->get('/panel_lekarza/pacjent/'.$id_pac.'/dodaj_opis_wizyty');//$data);
		$response->assertSuccessful();
        $response->assertRedirect('/panel_lekarza/pacjent/'.$id_pac);
		$response->assertSessionHas('info','Dodano opis wizyty.');
    }*/
	
	public function testAddVisitDescriptionOtherUser()
    {
		$id_pac = 2;
        $user = factory(User::class)->create(['user_type' => 'patient',]); 
		$response = $this->actingAs($user)->get('/panel_lekarza/pacjent/'.$id_pac.'/dodaj_opis_wizyty');
		$response->assertRedirect('/');
		$response->assertSessionHas('info','Strona niedostępna!');		
    }
}
