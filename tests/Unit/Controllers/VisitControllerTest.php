<?php

namespace Tests\Unit\Controllers;

use Tests\TestCase;
use App\User;
use App\Visit;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * 
 * @group viscont
 */
class VisitsControllerTest extends TestCase
{

	public function testVisitsViewNotAuthenticatedUser()
    {
		$response = $this->get('/panel/wizyty');
		$response->assertRedirect('/login');
	}


	public function testVisitsView()
    {
        $user = factory(User::class)->make(['id' => 4,'user_type'=>'patient',]); 
		$response = $this->actingAs($user)->get('/panel/wizyty');
		$response->assertSuccessful();
		$visit = new Visit();
        $response->assertViewIs('pacjent-panel.panel-wizyty');
		$response->assertViewHas(['wizytyPrzeszle' => $visit->getPastVisits(4)]);
		$response->assertViewHas(['wizytyDzis' =>  $visit->getTodaysVisits(4)]);
		$response->assertViewHas(['wizytyNadchodzace' => $visit->getFutureVisits(4)]);
    }
	
	
	public function testDeleteVisit()
	{
		$user = factory(User::class)->make(['id'=> 4,'user_type'=>'patient',]); 
		$response = $this->actingAs($user)->post('/panel/wizyty/usun_wizyte',['id_wizyty'=> 1,]);
		$response->assertRedirect('/panel/wizyty');
		$response->assertSessionHas('info','Wizyta została odwołana');
	}

	
}
