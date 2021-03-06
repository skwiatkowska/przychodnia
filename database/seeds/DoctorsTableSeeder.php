<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctors')->insert([
            [
                'id_usr'=>1,
                'imie' => 'Anna',
                'nazwisko' => 'Nowak',
                'specjalizacja' => 'dermatolog',
                'tytul'=>'dr',
                'gabinet' => 11,
                'telefon' => 123123123,
                'email' => 'nowak@przychodnia.pl',
                'password' => bcrypt('nowak'),
            ], [
                'id_usr'=>2,
                'imie' => 'Jan',
                'nazwisko' => 'Kowalski',
                'specjalizacja' => 'pediatra',
                'tytul'=>'dr',
                'gabinet' => 22,
                'telefon' => 234234234,
                'email' => 'kowalski@przychodnia.pl',
                'password' => bcrypt('kowalski'),
            ], [
                'id_usr'=>8,
                'imie' => 'Lech',
                'nazwisko' => 'Lekarski',
                'specjalizacja' => 'neurolog',
                'tytul'=>'dr',
                'gabinet' => 13,
                'telefon' => 345345345,
                'email' => 'lekarski@przychodnia.pl',
                'password' => bcrypt('lekarski'),
            ], [
                'id_usr'=>9,
                'imie' => 'Joanna',
                'nazwisko' => 'Zychowicz',
                'specjalizacja' => 'ortopeda',
                'tytul'=>'dr',
                'gabinet' => 29,
                'telefon' => 901902903,
                'email' => 'zychowicz@przychodnia.pl',
                'password' => bcrypt('zychowicz'),
            ], [
                'id_usr'=>10,
                'imie' => 'Jadwiga',
                'nazwisko' => 'Jadwigowska',
                'specjalizacja' => 'endokrynolog',
                'tytul'=>'dr',
                'gabinet' => 27,
                'telefon' => 567567567,
                'email' => 'jadwigowska@przychodnia.pl',
                'password' => bcrypt('jadwigowska'),
            ], [
                'id_usr'=>11,
                'imie' => 'Kazimierz',
                'nazwisko' => 'Zabiegowy',
                'specjalizacja' => 'kardiolog',
                'tytul'=>'dr',
                'gabinet' => 89,
                'telefon' => 789789789,
                'email' => 'zabiegowy@przychodnia.pl',
                'password' => bcrypt('zabiegowy'),
            ]
        ]);
    }
}
