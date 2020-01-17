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
		$user_id = 400;
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
		$this->assertContains($doctorU -> getErrors()[0],'Wszystkie pola sa obowiazkowe');
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
		$this->assertContains($doctorU -> getErrors()[0],'Konto jest juz zarejestrowane na podany email.');
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
	
	
	/**
     * @expectedException \ErrorException
     */
	public function testChangeDataWrongID()
	{
		$i = 0;	
		$doctor = new Doctor();
		$this -> assertFalse($doctor->changeData($i,"XXX",null,null,null,null,null,null));
	}
		
	public function testChangeDataCorrectID()
	{
		$i = 7;	
		$doctor = new Doctor();
		$name = $this->faker->name;
		$surname = $this->faker->lastname;
		$email = $this->faker->unique()->safeEmail;
		$title = $this->faker->word;
		$specialization = $this->faker->word;
		$gabinet = $this->faker->randomDigit ;
		$phone = $this->faker->numberBetween(100000000,999999999);	
		$this -> assertTrue($doctor->changeData($i,$title,$name,$surname,$email,$phone,$specialization,$gabinet));
		
		$name_ = Doctor::where('id', $i)->first()['imie'];
		$surname_ = Doctor::where('id', $i)->first()['nazwisko'];
        $email_ = Doctor::where('id', $i)->first()['email'];
		$title_ = Doctor::where('id', $i)->first()['tytul'];
		$specialization_ = Doctor::where('id', $i)->first()['specjalizacja'];
        $phone_ = Doctor::where('id', $i)->first()['telefon'];				
		$gabinet_ = Doctor::where('id', $i)->first()['gabinet'];
		$this -> assertEquals($name, $name_);
		$this -> assertEquals($surname, $surname_);
		$this -> assertEquals($email, $email_);
		$this -> assertEquals($title, $title_);
		$this -> assertEquals($specialization, $specialization_);
		$this -> assertEquals($phone, $phone_);
		$this -> assertEquals($gabinet, $gabinet_);
		
	} 
}
//$data_all = Doctor::where('id_usr', $doctorId)->get();