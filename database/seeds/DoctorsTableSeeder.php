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
                'gabinet' => 11,
                'telefon' => 123123123,
            ], [
                'imie' => 'Jan',
                'nazwisko' => 'Kowalski',
                'gabinet' => 22,
                'telefon' => 234234234,
            ], [
                'imie' => 'Lech',
                'nazwisko' => 'Lekarski',
                'gabinet' => 13,
                'telefon' => 345345345,
            ], [
                'imie' => 'Joanna',
                'nazwisko' => 'Leczaca',
                'gabinet' => 29,
                'telefon' => 901902903,
            ], [
                'imie' => 'Jadwiga',
                'nazwisko' => 'Jadwigowska',
                'gabinet' => 27,
                'telefon' => 567567567,
            ], [
                'imie' => 'Kazimierz',
                'nazwisko' => 'Zabiegowy',
                'gabinet' => 89,
                'telefon' => 789789789,
            ]
        ]);
    }
}
