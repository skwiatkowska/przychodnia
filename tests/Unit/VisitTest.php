<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Visit;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
*@group visit
*/
class VisitTest extends TestCase
{

	public function testNotAuthenticatedUserAddVisit()
	{
		$visit = new Visit();
		$this->assertFalse($visit -> addVisit(4, 1, '2019-12-27', '8:00',"",""));		
	}
	/*
	public function testAuthenticatedUserAddVisit()
	{
		$user = factory(User::class)->make(['user_type' => 'patient',]);
		$visit = new Visit();
		//$this->assertFalse($visit -> addVisit(4, 1, '2019-12-27', '8:00',"",""));	
		$this->assertTrue($this->actingAs($user)->visit->addVisit(4, 1, '2019-12-27', '8:00'));
	}*/

	 /*
	public function testAuthenticatedUserAddVisit()
	{
		$user = factory(User::class)->make(['user_type' => 'patient',]);
		$visit = new Visit();
		$this->assertTrue($this->actingAs($user)->addVisit(4, 1, '2019-12-27', '8:00'));		
	}*/
	
	/**
	 *@expectedException \ErrorException
     */
	public function testGetAllVisits()
	{
		$visit = new Visit();
		$visits = Visit::all();
		$this->assertEquals($visits, $visit->getAllVisits());		
	}
}
/*$name = $this->faker->name;	
		$email = $this->faker->unique()->safeEmail;	
        $password = $this->faker->password(8);
		$user_type = 'patient';
		$usr = new User();*/