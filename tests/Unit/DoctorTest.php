<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Doctor;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DoctorTest extends TestCase
{
    use WithFaker;
    /**
     * 
     * @group doctor

     */
	 /*
    public function testGetErrors()
    {
		$i = 0;	
        $this->assertFalse(Deadline::findDoctorFreeDeadlines($i));
    }*/
	
	/**
     * 
     * @group doctor
     *  @expectedException \ErrorException
     */
	public function testGetDataWrongID()
	{
		$i = 0;	
		$doctor = new Doctor();
		$doctor->getData($i);
		$this->expectExceptionMessage('Undefined offset: '.$i);
    }
	
	/**
     * 
     * @group doctor   
     */
	 
	public function testGetDataCorrectID()
	{
		$i = 1;	
		$doctor = new Doctor();
		$data = $doctor->getData($i);
		$data_all = Doctor::where('id_usr', $i)->get();
		$this->assertEquals($data,$data_all[0]);
    }
}
//$data_all = Doctor::where('id_usr', $doctorId)->get();