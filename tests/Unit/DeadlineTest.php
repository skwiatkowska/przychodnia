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
	
	
	public function testFindDoctorFreeDeadlinesWhenBusyVisitExist()
    {
		$visit = new Visit();
		$visit -> addVisit(4, 1, '2019-12-27', '8:30', "", "");
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
	
}
//assertContains()
