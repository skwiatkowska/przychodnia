<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
	use WithFaker;
    /**
     *@group user
     */
    public function testIsAdmin() {
		$user = factory(User::class)->make(['user_type' => 'reception',]); 
		//$this->assertEquals($user->user_type, User::ADMIN_TYPE);
        //return $this->user_type == self::ADMIN_TYPE;
		$this->assertTrue($user->isAdmin());
    }
	
	/**
     *@group user
     */
	public function testIsDoctor() {
		$user = factory(User::class)->make(['user_type' => 'doctor',]); 
		$this->assertEquals($user->user_type, User::DOCTOR_TYPE);
        //return $this->user_type == self::DOCTOR_TYPE;
		$this->assertTrue($user->isDoctor());
    }
	
	/**
     *@group user
     */
	/* 
	public function testgetUsrTypePatient() {
		$user = factory(User::class)->make(['user_type' => 'patient',]); 
		$usr = new User();
		$this->assertEquals($user->getUsrType($user->email), 'patient');
        //return $this->user_type == self::DOCTOR_TYPE;
    }*/
	
	public function testAddUserCorrect(){
		$name = $this->faker->name;	
		$email = $this->faker->unique()->safeEmail;	
        $password = $this->faker->password(8);
		$user_type = 'patient';
		$usr = new User();
		$this->assertNotNull($usr -> addUser($name, $email, $password, $user_type));
		
	}
	/**
     *@group user
     */
	
	public function testAddUserIncorrect(){
		$name = Null;	
		$email = $this->faker->unique()->safeEmail;	
        $password = $this->faker->password(8);
		$user_type = 'patient';
		$usr = new User();
		$this->assertFalse($usr -> addUser($name, $email, $password, $user_type));		
	}
	
	
}
/*
public function getUsrType($email) {
        $type_data = User::where('email', $email)->first()['user_type'];
        return $type_data;
    }*/
		