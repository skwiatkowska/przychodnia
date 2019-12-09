<?php

// OK

namespace Tests\Unit\Controllers;

use Tests\TestCase;
use App\Doctor;
use App\Deadline;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HospitalControllerTest extends TestCase
{
	use WithFaker;

	
	//Czy wyswietla sie widok glownej strony?
	public function testMainSiteView()
    {
        $response = $this->get('/');
        $response->assertSuccessful();
        $response->assertViewIs('przychodnia');
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
	
}
