<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Patient;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * 
 * @group patient   
 */
	 
class PatientTest extends TestCase
{
	use WithFaker;
	
	public function testAddNewUserCorrectData()
    {
		$id_usr = 500;
		$name = $this->faker->name;
		$surname = $this->faker->lastname;
        $email = $this->faker->unique()->safeEmail;
		$pesel = $this->faker->numberBetween(100000000000,99999999999);
		$adres = $this->faker->address;
        $telefon = $this->faker->numberBetween(100000000,999999999);				
		$data_urodzenia = $this->faker->date;	
		$password = $this->faker->password(8);
		
		$patient =  new Patient;
        $this->assertTrue($patient->addNewUser($id_usr, $name, $surname, $email, $pesel, $adres,$telefon,$data_urodzenia, $password));
	}
	
	/**
	*@covers App\Patient::addNewUser
	*@covers App\Patient::getErrors
	*/ 

    public function testAddNewUserEmptyField()
    {
		$id_usr = 250;
		$name = $this->faker->name;
		$surname = null;
        $email = $this->faker->unique()->safeEmail;
		$pesel = $this->faker->numberBetween(100000000000,99999999999);
		$adres = $this->faker->address;
        $telefon = $this->faker->numberBetween(100000000,999999999);				
		$data_urodzenia = $this->faker->date;	
		$password = $this->faker->password(8);

		$patient =  new Patient;
        $this->assertFalse($patient->addNewUser($id_usr, $name, $surname, $email, $pesel, $adres,$telefon,$data_urodzenia, $password));
		$this->assertNotNull($patient -> getErrors());
		$this->assertContains($patient -> getErrors()[0],'Wszystkie pola sa obowiazkowe');
	}
	
	/**
	*@covers App\Patient::addNewUser
	*@covers App\Patient::getErrors
	*/ 
	public function testAddNewUserWrongEmail()
    {
		$id_usr = 250;
		$name = $this->faker->name;
		$surname = $this->faker->lastname;
        $email = "test@test.test";
		$pesel = $this->faker->numberBetween(100000000000,99999999999);
		$adres = $this->faker->address;
        $telefon = $this->faker->numberBetween(100000000,999999999);				
		$data_urodzenia = $this->faker->date;	
		$password = $this->faker->password(8);

		$patient =  new Patient;
        $this->assertFalse($patient->addNewUser($id_usr, $name, $surname, $email, $pesel, $adres,$telefon,$data_urodzenia, $password));
		$this->assertNotNull($patient -> getErrors());
		$this->assertContains($patient -> getErrors()[0],'Konto jest juz zarejestrowane na podany email.');
	}
	
	
    /**
     * @expectedException \ErrorException
     */
	public function testGetDataWrongID()
	{
		$i = 0;	
		$patient = new Patient();
		$patient->getData($i);
		$this->expectExceptionMessage('Undefined offset: '.$i);
    }
	 
	public function testGetDataCorrectID()
	{
		$i = 4;	
		$patient = new Patient();
		$data = $patient->getData($i);
		$data_all = Patient::where('id_usr', $i)->get();
		$this->assertEquals($data,$data_all[0]);
    }
	
	
	public function testGetUserIdWrongID()
	{
		$i = 0;	
		$patient = new Patient();
		$this->assertNull($patient -> getUserId($i));
	}
	
	public function testGetUserIdCorrectID()
	{
		$i = 4;	
		$patient = new Patient();
		$id = $patient->getUserId($i);
		$id_usr = Patient::where('id_usr', $id)->get()[0]['id'];
		$this->assertEquals($i, $id_usr);  
	}
	
	
	/**
     * @expectedException \ErrorException
     */
	public function testChangeDataWrongID()
	{
		$i = 0;	
		$patient = new Patient();
		$this -> assertFalse($patient->changeData($i,"XXX",null,null,null,null,null,null));
	}
	
	
	public function testChangeDataCorrectID()
	{
		$i = 4;	
		$patient = new Patient();
		$name = $this->faker->name;
		$surname = $this->faker->lastname;
        $email = "test@test.test";
		$pesel = $this->faker->numberBetween(100000000000,99999999999);
		$adres = $this->faker->address;
        $telefon = $this->faker->numberBetween(100000000,999999999);				
		$data_urodzenia = $this->faker->date;	
		$this -> assertTrue($patient->changeData($i,$name,$surname,$email,$pesel,$adres,$telefon,$data_urodzenia));
		
		$name_ = Patient::where('id_usr', $i)->first()['imie'];
		$surname_ = Patient::where('id_usr', $i)->first()['nazwisko'];
        $email_ = Patient::where('id_usr', $i)->first()['email'];
		$pesel_ = Patient::where('id_usr', $i)->first()['pesel'];
		$adres_ = Patient::where('id_usr', $i)->first()['adres'];
        $telefon_ = Patient::where('id_usr', $i)->first()['telefon'];				
		$data_urodzenia_ = Patient::where('id_usr', $i)->first()['data_urodzenia'];
		$this -> assertEquals($name, $name_);
		$this -> assertEquals($surname, $surname_);
		$this -> assertEquals($email, $email_);
		$this -> assertEquals($pesel, $pesel_);
		$this -> assertEquals($adres, $adres_);
		$this -> assertEquals($telefon, $telefon_);
		$this -> assertEquals($data_urodzenia, $data_urodzenia_);
		
	}
	
	
}
