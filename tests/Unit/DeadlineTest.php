<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Deadline;
use App\Visit;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * 
 * @group deadline
 * 
 */
class DeadlineTest extends TestCase
{
	use WithFaker;
    
	
    public function testFindDoctorFreeDeadlinesWrongID()
    {
		$i = 0;	
        $this->assertFalse(Deadline::findDoctorFreeDeadlines($i));
    }

	public function testFindDoctorFreeDeadlinesCorrectID()
    {
		$i = 1;	
        $this->assertNotNull(Deadline::findDoctorFreeDeadlines($i));
    }
	
	
	public function testFindDoctorAllDeadlinesWrongID()
    {
		$i = 0;	
        $this->assertFalse(Deadline::findDoctorAllDeadlines($i));
    }

	public function testFindDoctorAllDeadlinesCorrectID()
    {
		$i = 1;	
        $this->assertNotNull(Deadline::findDoctorAllDeadlines($i));
    }
	
	
	/**
	*@covers App\Deadline::addDeadline
	*@covers App\Deadline::getErrors
	*/
	
	public function testAddDeadlineCorrectIDEmptyField()
    {
		$i = 1;	
		$deadline = new Deadline();
        $this->assertFalse($deadline -> addDeadline($i,null,null,null));
		$this->assertNotNull($deadline -> getErrors());
		$this->assertContains($deadline -> getErrors()[0],'Wszystkie pola sa obowiazkowe');
    }
	
	public function testAddDeadlineCorrectIDNotEmptyField()
    {
		$i = 1;
		$hour_from = '12:00';
		$hour_to = '14:00';
		$date = 20200117;
		$deadline = new Deadline();
        $this->assertTrue($deadline -> addDeadline($i,$hour_from, $hour_to, $date));
    }
	
	public function testAddDeadlineWrongID()
    {
		$i = 0;	
		$deadline = new Deadline();
        $this->assertFalse($deadline -> addDeadline($i,null,null,null));
    }
	
	
	
	public function testRemoveDeadlineCorrectIDEmptyField()
    {
		$i = 1;	
		$deadline = new Deadline();
        $this->assertFalse($deadline -> removeDeadline($i,null));
		$this->assertContains($deadline -> getErrors()[0],'Wszystkie pola sa obowiazkowe');
    }
	
	public function testRemoveDeadlineCorrectIDNotEmptyField()
    {
		$i = 1;
		$date = 20200117;
		$deadline = new Deadline();
        $this->assertTrue($deadline -> removeDeadline($i,$date));
    }
	
	public function testDeleteDeadlineWrongID()
    {
		$i = 0;	
		$deadline = new Deadline();
        $this->assertFalse($deadline -> removeDeadline($i,null,null,null));
    }
	
	
	
	public function testChangeDeadlineCorrectIDEmptyField()
    {
		$i = 1;	
		$deadline = new Deadline();
        $this->assertFalse($deadline -> changeDeadline($i,null,null,null));
		$this->assertContains($deadline -> getErrors()[0],'Wszystkie pola sa obowiazkowe');
    }
	
	public function testChangeDeadlineCorrectIDNotEmptyField()
    {
		$i = 1;
		$date = 20201228;
		$hour_from = '12:00';
		$hour_to = '14:00';
		$deadline = new Deadline();
        $this->assertTrue($deadline -> changeDeadline($i,$hour_from, $hour_to, $date));
    }
	
	public function testChangeDeadlineWrongID()
    {
		$i = 0;	
		$deadline = new Deadline();
        $this->assertFalse($deadline -> changeDeadline($i,null,null,null));
    }
	
}
