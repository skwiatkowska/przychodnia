<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabasePatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patients')->insert([
            [   'id' => 1,
                'imie' => 'Izabela',
                'nazwisko' => 'Szczydło',
                'email' => 'a@aaaaaaa.pl',
                'pesel' => 11111111122,
                'adres' => 'tutaj mieszkam gdzie mieszkam',
                'password' => 'justtext',
            ]
        ]);
    }
}
