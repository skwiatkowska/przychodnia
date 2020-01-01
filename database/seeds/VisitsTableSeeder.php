<?php

use Illuminate\Database\Seeder;

class VisitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('visits')->insert([
            [
                'id_lekarza'=> 1,
                'id_pacjenta'=> 4,
                'rok_miesiac_dzien'=>20191227,
                'godzina_minuta'=>'14:00',
                'opis'=> 'opis wizyty test 1',
                'zalecenia'=>'zalecenia1',
            ], [
                'id_lekarza'=> 1,
                'id_pacjenta'=> 12,
                'rok_miesiac_dzien'=>20191228,
                'godzina_minuta'=>'19:00',
                'opis'=>'opis wizyty test 2',
                'zalecenia'=>'zalecenia2',
            ]
        ]);
    }
}
