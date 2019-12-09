<?php

//OK

namespace Tests\Unit\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClinicsControllerTest extends TestCase
{
	//Czy wyswietla sie widok poradnii?
	public function testLoginSiteView()
    {
        $response = $this->get('/poradnie');
        $response->assertSuccessful();
        $response->assertViewIs('poradnie');
    }
}
