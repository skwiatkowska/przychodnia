<?php
// OK - DO ZMIANY 
namespace Tests\Unit\Controllers;

use Tests\TestCase;
use App\Patient;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PatientControllerTest extends TestCase
{
    //Czy wyswietla sie lista pacjentow i czy zawiera wszystkich pacjentow?
	public function testPatientsListView()
    {
		$patients = Patient::all();
        $response = $this->get('/lista_pacjentow');
        $response->assertSuccessful();
        $response->assertViewIs('lista-pacjentow');
		$response->assertViewHas(['patients' => $patients]);
    }
}
