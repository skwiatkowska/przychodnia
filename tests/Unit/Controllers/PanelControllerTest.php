<?php

// OK

namespace Tests\Unit\Controllers;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PanelControllerTest extends TestCase
{

	//Czy niezalogowanemu uzytkownikowi wyswietla sie widok panelu?
	public function testNotAuthenticatedUserPanelSiteView()
    {
		$response = $this->get('/panel');
		$response->assertRedirect('/login');
	}
	
	
	//Czy zalogowanemu uzytkownikowi wyswietla sie widok panelu?
	public function testPanelSiteView()
    {
        $user = factory(User::class)->make(); 
		$response = $this->actingAs($user)->get('/panel');
		$response->assertSuccessful();
        $response->assertViewIs('panel');
    }
}
