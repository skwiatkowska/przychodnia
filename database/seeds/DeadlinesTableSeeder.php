<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeadlinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('deadlines')->insert([
            [
                'id_lekarza' => 1,
                'godzina_od' => '8:00',
                'godzina_do' => '13:00',
                'rok_miesiac_dzien' => 20191227,
            ],[
                'id_lekarza' => 1,
                'godzina_od' => '15:00',
                'godzina_do' => '19:00',
                'rok_miesiac_dzien' => 20191228,
            ],[
                'id_lekarza' => 2,
                'godzina_od' => '8:00',
                'godzina_do' => '13:00',
                'rok_miesiac_dzien' => 20191229,
            ],[
                'id_lekarza' => 2,
                'godzina_od' => '14:00',
                'godzina_do' => '20:00',
                'rok_miesiac_dzien' => 20191230,
            ],[
                'id_lekarza' => 3,
                'godzina_od' => '10:00',
                'godzina_do' => '18:00',
                'rok_miesiac_dzien' => 20191222,
            ],[
                'id_lekarza' => 3,
                'godzina_od' => '9:00',
                'godzina_do' => '14:00',
                'rok_miesiac_dzien' => 20191221,

            ],[
                'id_lekarza' => 4,
                'godzina_od' => '15:00',
                'godzina_do' => '19:00',
                'rok_miesiac_dzien' => 20191227,
            ],[
                'id_lekarza' => 4,
                'godzina_od' => '10:00',
                'godzina_do' => '16:00',
                'rok_miesiac_dzien' => 20200328,
            ],[
                'id_lekarza' => 5,
                'godzina_od' => '8:00',
                'godzina_do' => '11:00',
                'rok_miesiac_dzien' => 20200322,
            ],[
                'id_lekarza' => 5,
                'godzina_od' => '8:00',
                'godzina_do' => '16:00',
                'rok_miesiac_dzien' => 20191227,
            ],[
                'id_lekarza' => 1,
                'godzina_od' => '15:00',
                'godzina_do' => '19:00',
                'rok_miesiac_dzien' => 20201228,
            ],[
                'id_lekarza' => 2,
                'godzina_od' => '8:00',
                'godzina_do' => '13:00',
                'rok_miesiac_dzien' => 20201229,
            ],[
                'id_lekarza' => 2,
                'godzina_od' => '14:00',
                'godzina_do' => '20:00',
                'rok_miesiac_dzien' => 20201230,
            ],[
                'id_lekarza' => 3,
                'godzina_od' => '10:00',
                'godzina_do' => '18:00',
                'rok_miesiac_dzien' => 20201222,
            ],[
                'id_lekarza' => 3,
                'godzina_od' => '9:00',
                'godzina_do' => '14:00',
                'rok_miesiac_dzien' => 20201221,
            ],[
                'id_lekarza' => 4,
                'godzina_od' => '15:00',
                'godzina_do' => '19:00',
                'rok_miesiac_dzien' => 20201227,
            ],[
                'id_lekarza' => 4,
                'godzina_od' => '10:00',
                'godzina_do' => '16:00',
                'rok_miesiac_dzien' => 20210328,
            ],[
                'id_lekarza' => 5,
                'godzina_od' => '8:00',
                'godzina_do' => '11:00',
                'rok_miesiac_dzien' => 20210322,
            ],[
                'id_lekarza' => 5,
                'godzina_od' => '8:00',
                'godzina_do' => '12:00',
                'rok_miesiac_dzien' => 20200102,
            ],[

                'id_lekarza' => 5,
                'godzina_od' => '8:00',
                'godzina_do' => '16:00',
                'rok_miesiac_dzien' => 20210327,
            ],
        ]);
    }
}
