<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Doctor;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * 
 * @group doctor
 */
class DoctorTest extends TestCase
{
    use WithFaker;
    
	
	public function testAddNewUserCorrectData()
    {
		$user_id = 200;
		$name = $this->faker->name;
		$surname = $this->faker->lastname;
		$email = $this->faker->unique()->safeEmail;
		$title = $this->faker->word;
		$specialization = $this->faker->word;
		$gabinet = $this->faker->randomDigit ;
		$password = $this->faker->password(8);
		$phone = $this->faker->numberBetween(100000000,999999999);

		$doctorU =  new Doctor;
        $this->assertTrue($doctorU->addNewUser($user_id,$title,$name, $surname, $specialization,$email,$phone,$gabinet,$password));
	}
	
	/**
	*@covers App\Doctor::addNewUser
	*@covers App\Doctor::getErrors
	*/ 

    public function testAddNewUserEmptyField()
    {
		$user_id = null;
		$name = $this->faker->name;
		$surname = $this->faker->lastname;
		$email = $this->faker->unique()->safeEmail;
		$title = $this->faker->word;
		$specialization = $this->faker->word;
		$gabinet = $this->faker->randomDigit ;
		$password = $this->faker->password(8);
		$phone = null;

		$doctorU =  new Doctor;
        $this->assertFalse($doctorU->addNewUser($user_id,$title,$name, $surname, $specialization,$email,$phone,$gabinet,$password));
		$this->assertNotNull($doctorU -> getErrors());
	}
	
	/**
	*@covers App\Doctor::addNewUser
	*@covers App\Doctor::getErrors
	*/ 
	public function testAddNewUserWrongEmail()
    {
		$user_id = 100;
		$name = $this->faker->name;
		$surname = $this->faker->lastname;
		$email = "nowak@przychodnia.pl";
		$title = $this->faker->word;
		$specialization = $this->faker->word;
		$gabinet = $this->faker->randomDigit ;
		$password = $this->faker->password(8);
		$phone = $this->faker->numberBetween(100000000,999999999);

		$doctorU =  new Doctor;
        $this->assertFalse($doctorU->addNewUser($user_id,$title,$name, $surname, $specialization,$email,$phone,$gabinet,$password));
		$this->assertNotNull($doctorU -> getErrors());
	}
	/**
     * @expectedException \ErrorException
     */
	public function testGetDataWrongID()
	{
		$i = 0;	
		$doctor = new Doctor();
		$doctor->getData($i);
		$this->expectExceptionMessage('Undefined offset: '.$i);
    }
	
	 
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