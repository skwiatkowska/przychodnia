<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Patient;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PatientTest extends TestCase
{
    /**
     * 
     * @group patient
     * @expectedException \ErrorException
     */
	public function testGetDataWrongID()
	{
		$i = 0;	
		$patient = new Patient();
		$patient->getData($i);
		$this->expectExceptionMessage('Undefined offset: '.$i);
    }
	
	/**
     * 
     * @group doctor   
     */
	 
	public function testGetDataCorrectID()
	{
		$i = 4;	
		$patient = new Patient();
		$data = $patient->getData($i);
		$data_all = Patient::where('id_usr', $i)->get();
		$this->assertEquals($data,$data_all[0]);
    }
}
