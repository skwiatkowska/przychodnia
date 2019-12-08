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
                'imie' => 'Anna',
                'nazwisko' => 'Nowak',
                'specjalizacja' => 'dermatolog',
                'gabinet' => 11,
                'telefon' => 123123123,
                'email' => 'nowak@przychodnia.pl',
                'password' => bcrypt('nowak'),
            ], [
                'imie' => 'Jan',
                'nazwisko' => 'Kowalski',
                'specjalizacja' => 'pediatra',
                'gabinet' => 22,
                'telefon' => 234234234,
                'email' => 'kowalski@przychodnia.pl',
                'password' => bcrypt('kowalski'),
            ], [
                'imie' => 'Lech',
                'nazwisko' => 'Lekarski',
                'specjalizacja' => 'neurolog',
                'gabinet' => 13,
                'telefon' => 345345345,
                'email' => 'lekarski@przychodnia.pl',
                'password' => bcrypt('lekarski'),
            ], [
                'imie' => 'Joanna',
                'nazwisko' => 'Leczaca',
                'specjalizacja' => 'ortopeda',
                'gabinet' => 29,
                'telefon' => 901902903,
                'email' => 'leczaca@przychodnia.pl',
                'password' => bcrypt('leczaca'),
            ], [
                'imie' => 'Jadwiga',
                'nazwisko' => 'Jadwigowska',
                'specjalizacja' => 'endokrynolog',
                'gabinet' => 27,
                'telefon' => 567567567,
                'email' => 'jadwigowska@przychodnia.pl',
                'password' => bcrypt('jadwigowska'),
            ], [
                'imie' => 'Kazimierz',
                'nazwisko' => 'Zabiegowy',
                'specjalizacja' => 'kardiolog',
                'gabinet' => 89,
                'telefon' => 789789789,
                'email' => 'zabiegowy@przychodnia.pl',
                'password' => bcrypt('zabiegowy'),
            ]
        ]);
    }
}
