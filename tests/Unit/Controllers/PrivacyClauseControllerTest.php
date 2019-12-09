<?php

//OK

namespace Tests\Unit\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PrivacyClauseControllerTest extends TestCase
{
    //Czy wyswietla sie widok klauzuli RODO?
	public function testLoginSiteView()
    {
        $response = $this->get('/rodo');
        $response->assertSuccessful();
        $response->assertViewIs('rodo');
    }
}
