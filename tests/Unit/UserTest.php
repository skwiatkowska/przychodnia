<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
*@group user
*/
class UserTest extends TestCase
{
	use WithFaker;

   
	public function testAddUserCorrect(){
		$name = $this->faker->name;	
		$email = $this->faker->unique()->safeEmail;	
        $password = $this->faker->password(8);
		$user_type = 'patient';
		$status = 'active';
		$usr = new User();
		$this->assertNotNull($usr -> addUser($name, $email, $password, $user_type, $status));
		
	}
	
	public function testAddUserIncorrect(){
		$name = Null;	
		$email = $this->faker->unique()->safeEmail;	
        $password = $this->faker->password(8);
		$user_type = 'patient';
		$status = 'active';
		$usr = new User();
		$this->assertFalse($usr -> addUser($name, $email, $password, $user_type, $status));		
	}
	
	
	public function testIsAdminIfAdmin() {
		$user = factory(User::class)->make(['user_type' => 'reception',]); 
		$this->assertTrue($user->isAdmin());
    }
	
	public function testIsAdminIfNotAdmin() {
		$user = factory(User::class)->make(['user_type' => 'patient',]); 
		$this->assertFalse($user->isAdmin());
    }


	public function testIsDoctorIfDoctor() {
		$user = factory(User::class)->make(['user_type' => 'doctor',]); 
		$this->assertTrue($user->isDoctor());
    }
	
	public function testIsDoctorIfNotDoctor() {
		$user = factory(User::class)->make(['user_type' => 'patient',]); 
		$this->assertFalse($user->isDoctor());
    }
	
	
	public function testIsActiveActive() {
		$email = "test@test.test";	
		$user = new User();
		$this->assertEquals($user->isActive($email),"active");
    }
	
	public function testIsActiveInactive() {
		$email = "lucja@kowalczyk.com";	
		$user = new User();
		$this->assertEquals($user->isActive($email),"inactive");
    }
	
	
	public function testDeactivateUser() {
		$id = 12;	
		$user = new User();
		$this->assertTrue($user->deactivateUser($id));
		$status = User::where('id', $id)->get()[0]['status'];
		$this->assertEquals($status,"inactive");
    }	
	
	
	public function testActivateUser() {
		$id = 12;	
		$user = new User();
		$this->assertTrue($user->activateUser($id));
		$status = User::where('id', $id)->get()[0]['status'];
		$this->assertEquals($status,"active");
    }
	
	
	public function testgetUsrTypePatient() {
		$email = "test@test.test";
		$user = new User();
		$this->assertEquals($user->getUsrType($email), 'patient');
		$email = "nowak@przychodnia.pl";
		$this->assertNotEquals($user->getUsrType($email), 'patient');
    }
	
	public function testgetUsrTypeDoctor() {
		$email = "nowak@przychodnia.pl";
		$user = new User();
		$this->assertEquals($user->getUsrType($email), 'doctor');
		$email = "test@test.test";
		$this->assertNotEquals($user->getUsrType($email), 'doctor');
    }
	
	public function testgetUsrTypeReception() {
		$email = "recepcja@przychodnia.pl";
		$user = new User();
		$this->assertEquals($user->getUsrType($email), 'reception');
		$email = "test@test.test";
		$this->assertNotEquals($user->getUsrType($email), 'reception');

    }
	
	/**
	*@covers App\User::login
	*@covers App\User::getErrors
	*/ 
	public function testLoginEmpty() {
		$email = $this->faker->unique()->safeEmail;	
        $password = $this->faker->password(8);
		$user_type = 'patient';
		$user = new User();
		$this->assertFalse($user -> login(Null,$password,$user_type,Null));
		$this->assertFalse($user -> login($email,Null,$user_type,Null));
		$this->assertFalse($user -> login($email,$password,Null,Null));
		$this->assertNotNull($user -> getErrors());
		
	}
	
	public function testLoginNotEmptyCorrectData() {
		$email = "test@test.test";	
        $password = 'test';
		$user_type = 'patient';	
		$user = new User();
		$this->assertTrue($user -> login($email,$password,$user_type,'active'));
	}
	
	public function testLoginNotEmptyWrongData() {
		$email = $this->faker->unique()->safeEmail;	
        $password = $this->faker->password(8);
		$user_type = 'patient';	
		$user = new User();
		$this->assertFalse($user -> login($email,$password,$user_type,'active'));
		$this->assertNotNull($user -> getErrors());
	}
	
	
	/**
     * @expectedException \Error
     */
	public function testChangeDataWrongID()
	{
		$i = 0;	
		$user = new User();
		$this -> assertFalse($user->changeData($i,null,null));
	}
	
	public function testChangeDataCorrectID()
	{
		$i = 12;
		$name = $this->faker->name();
	    $email = $this->faker->unique()->safeEmail;	
		$user = new User();
		$this -> assertTrue($user->changeData($i,$name,$email));
		
		$name_ = User::where('id', $i)->first()['name'];
        $email_ = User::where('id', $i)->first()['email'];
		$this -> assertEquals($name, $name_);
		$this -> assertEquals($email, $email_);
		$user->changeData($i,"Test","test@test.test");
	}
	
	
	/**
     * @expectedException \ErrorException
     */
	public function testChangePasswordWrongID()
	{
		$i = 0;	
		$user = new User();
		$this -> assertFalse($user->changePassword($i,null,null,null));
	}
	
	public function testChangePasswordCorrectIDWrongOldPassword()
	{
		$i = 12;
	    $old = "xs";
		$user = new User();
		$this -> assertFalse($user->changePassword($i,$old,null,null));
	}
	
	public function testChangePasswordCorrectIDWrongNew2Password()
	{
		$i = 12;
	    $old = "test";
		$new = "test1";
		$user = new User();
		$this -> assertFalse($user->changePassword($i,$old,$new,"xs"));
	}
	
	public function testChangePasswordCorrectIDCorrectOldPassword()
	{
		$i = 12;
	    $old = "test";
		$new = "test1";
		$user = new User();
		$this -> assertTrue($user->changePassword($i,$old,$new,$new));
		$user->changePassword($i,$new,$old,$old);
	}
	
	
	/**
     * @expectedException \ErrorException
     */
	public function testForceNewPasswordWrongID()
	{
		$i = 0;	
		$user = new User();
		$this -> assertFalse($user->forceNewPassword($i,null,null));
	}
	
	public function testForceNewPasswordCorrectIDWrongNew2Password()
	{
		$i = 12;
		$new = "test1";
		$user = new User();
		$this -> assertFalse($user->forceNewPassword($i,$new,"xs"));
	}
	
	public function testForceNewPasswordCorrectIDCorrectPasswords()
	{
		$i = 12;
		$old = "test";
		$new = "test1";
		$user = new User();
		$this -> assertTrue($user->forceNewPassword($i,$new,$new));
		$user->forceNewPassword($i,$old,$old);
	}
	
	
	/**
     * @expectedException \ErrorException
     */
	public function testResetDoctorPasswordWrongID()
	{
		$i = 0;	
		$user = new User();
		$this -> assertFalse($user->resetDoctorPassword($i,null,null));
	}
	
	public function testResetDoctorPasswordCorrectIDWrongNew2Password()
	{
		$i = 8;
		$new = "test1";
		$user = new User();
		$this -> assertFalse($user->resetDoctorPassword($i,$new,"xs"));
	}
	
	public function testResetDoctorPasswordCorrectIDCorrectPasswords()
	{
		$i = 8;
		$old = "lekarski";
		$new = "test1";
		$user = new User();
		$this -> assertTrue($user->resetDoctorPassword($i,$new,$new));
		$user->resetDoctorPassword($i,$old,$old);
	}
	
}

		