<?php

namespace Tests\Unit\Controllers;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * 
 * @group webcont   
 */
class WebsiteControllerTest extends TestCase
{
	public function testMainSiteNotAuthenticatedAndPatient()
    {
        $response = $this->get('/');
        $response->assertSuccessful();
        $response->assertViewIs('home');
    }
	
	public function testMainSiteDoctor()
    {
        $user = factory(User::class)->create(['user_type' => 'doctor',]); 
		$response = $this->actingAs($user)->get('/');
		$response->assertSuccessful();
        $response->assertViewIs('lekarz-panel.panel-lekarza');
    }
	
	public function testMainSiteReception()
    {
        $user = factory(User::class)->create(['user_type' => 'reception',]); 
		$response = $this->actingAs($user)->get('/');
		$response->assertSuccessful();
        $response->assertViewIs('recepcja-panel.recepcja');
    }
	

	public function testRodo()
    {
        $response = $this->get('/rodo');
        $response->assertSuccessful();
        $response->assertViewIs('rodo');
    }
	
	public function testClinicList()
    {
        $response = $this->get('/poradnie');
        $response->assertSuccessful();
        $response->assertViewIs('poradnie');
    }
}
