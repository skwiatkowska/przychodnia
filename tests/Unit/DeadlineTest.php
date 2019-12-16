<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Deadline;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeadlineTest extends TestCase
{
	use WithFaker;
    /**
     * 
     * @group deadline
     * 
     */
    public function testFindDoctorFreeDeadlinesWrongID()
    {
		$i = 0;	
        $this->assertFalse(Deadline::findDoctorFreeDeadlines($i));
    }
	/**
     * 
     * @group deadline
     * 
     */
	public function testFindDoctorFreeDeadlinesCorrectID()
    {
		$i = 1;	
        $this->assertNotNull(Deadline::findDoctorFreeDeadlines($i));
    }
	
	/**
     * 
     * @group deadline
     * 
     *//*
	public function testFindDoctorFreeDeadlinesBusyVisits()
    {
		$i = 1;	
        $this->assertTrue(Deadline::findDoctorFreeDeadlines($i));
    }
	*/
}
//assertContains()
