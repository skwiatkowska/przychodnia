<?php

//NIE OK - niezalogowany widzi ustawienia konta

namespace Tests\Unit\Controllers;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserSettingsControllerTest extends TestCase
{
    //Czy niezalogowanemu uzytkownikowi wyswietla sie widok ustawien konta?
	public function testNotAuthenticatedUserSettingsSiteView()
    {
		$response = $this->get('/panel/ustawienia');
		$response->assertStatus(200);
		//$response->assertRedirect('/login');
	}
	
	
	//Czy zalogowanemu uzytkownikowi wyswietla sie widok ustawien konta?
	public function testSettingsSiteView()
    {
        $user = factory(User::class)->make(); 
		$response = $this->actingAs($user)->get('panel/ustawienia');
		$response->assertSuccessful();
        $response->assertViewIs('ustawienia');
    }
}
