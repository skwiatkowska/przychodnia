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
	
	/**
	*@covers App\Visit::addVisit
	*@covers App\Visit::getErrors
	*/
	public function testAddVisitNotAuthenticatedUser()
	{
		$visit = new Visit();
		$this->assertFalse($visit -> addVisit(4, 1, '2019-12-27', '8:00',"",""));
		$this->assertNotNull($visit -> getErrors());
		$this->assertContains($visit -> getErrors()[0],'Aby dokonać rezerwacji musisz być <a href="/login">zalogowany!</a>!');		
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
	
	
	public function testGetTodaysVisitsWrongId()
	{
		$id = 0;
		$visit = new Visit();
		$this->assertTrue($visit->getTodaysVisits($id)->isEmpty());		
	}
	
	
	public function testGetPastVisitsCorrectId()
	{
		$id = 4;
		$visit = new Visit();
		$this->assertNotNull($visit->getPastVisits($id));		
	}
	
	public function testGetPastVisitsWrongId()
	{
		$id = 0;
		$visit = new Visit();
		$this->assertTrue($visit->getPastVisits($id)->isEmpty());		
	}
	
	
	public function testGetFutureVisitsWrongId()
	{
		$id = 0;
		$visit = new Visit();
		$this->assertTrue($visit->getFutureVisits($id)->isEmpty());		
	}
	
	

	public function testFindAllPatientDataCorrectId()
	{
		$i = 4;
		$this->assertNotNull(Visit::findAllPatientData($i));
		//$this->assertContains(Visit::findAllPatientData($i)[0],$i);
	}
	
	public function testFindAllPatientDataWrongId()
	{
		$i = 0;
		$this->assertFalse(Visit::findAllPatientData($i));
	}
	
	
	public function testGetAllVisits()
	{
		$visit = new Visit();
		//$visits = Visit::all();
		$this->assertNotNull($visit->getAllVisits());		
	}
	
	
	public function testFindAllDoctorDataCorrectId()
	{
		$i = 1;
		$this->assertNotNull(Visit::findAllDoctorData($i));
		//$this->assertContains(Visit::findAllPatientData($i)[0],$i);
	}
	
	public function testFindAllDoctorDataWrongId()
	{
		$i = 0;
		$this->assertFalse(Visit::findAllDoctorData($i));
	}
	
	
	/**
     * @expectedException \Error
     */
	public function testAddDescriptionWrongId()
	{
		$i = 0;	
		$visit = new Visit();
		$this -> assertFalse($visit -> addDescription($i,null,null));
	}
	
	public function testAddDescriptionCorrectId()
	{
		$i = 7;	
		$visit = new Visit();
		$description = "opis";
		$recommendation = "zalecenia";
		
		$this -> assertTrue($visit->addDescription($i,$description,$recommendation));
		
		$description_ = Visit::where('id', $i)->first()['opis'];
		$recommendation_ = Visit::where('id', $i)->first()['zalecenia'];
		$this -> assertEquals($description_,$description);
		$this -> assertEquals($recommendation_,$recommendation);
	}	
}
/*$name = $this->faker->name;	
		$email = $this->faker->unique()->safeEmail;	
        $password = $this->faker->password(8);
		$user_type = 'patient';
		$usr = new User();*/