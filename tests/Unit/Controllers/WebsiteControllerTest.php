<?php

//OK

namespace Tests\Unit\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WebsiteControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
	 
    //Czy wyswietla sie widok glownej strony?
	public function testMainSiteView()
    {
        $response = $this->get('/');
        $response->assertSuccessful();
        $response->assertViewIs('home');
    }
	
	//Czy wyswietla sie widok klauzuli RODO?
	public function testRodoSiteView()
    {
        $response = $this->get('/rodo');
        $response->assertSuccessful();
        $response->assertViewIs('rodo');
    }
	
	//Czy wyswietla sie widok poradnii?
	public function testClinicsSiteView()
    {
        $response = $this->get('/poradnie');
        $response->assertSuccessful();
        $response->assertViewIs('poradnie');
    }
}
