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
            [
                'id_usr' => 4,
                'imie' => 'Blanka',
                'nazwisko' => 'Dominguez',
                'email' => 'blanka@losowymail.com',
                'pesel' => '39827490823',
                'adres' => 'ul. Sosnowa 27, Blachownia',
                'telefon' => '123123123',
                'data_urodzenia' => 19970302,
                'password' => bcrypt('blanka'),
            ], [
                'id_usr' => 5,
                'imie' => 'Patryk',
                'nazwisko' => 'Piotrowski',
                'email' => 'patryk@patryk.com',
                'pesel' => '39827495463',
                'adres' => 'ul. Stawowa 145, Kraków',
                'telefon' => '123122843',
                'data_urodzenia' => 19800712,
                'password' => bcrypt('patryk'),
            ], [
                'id_usr' => 6,
                'imie' => 'Łucja',
                'nazwisko' => 'Kowalczyk',
                'email' => 'lucja@kowalczyk.com',
                'pesel' => '39835440823',
                'adres' => 'ul. Kopernika 3, Kraków',
                'telefon' => '122223223',
                'data_urodzenia' => 19771111,
                'password' => bcrypt('lucja'),
            ], [
                'id_usr' => 7,
                'imie' => 'Antoni',
                'nazwisko' => 'Antoniewski',
                'email' => 'antoni@antek.com',
                'pesel' => '39111222323',
                'adres' => 'ul. Antoniego 22, Kraków',
                'telefon' => '123128883',
                'data_urodzenia' => 19981009,
                'password' => bcrypt('antoni'),
            ], [
                'id_usr' => 12,
                'imie' => 'Test',
                'nazwisko' => 'Test',
                'email' => 'test@test.test',
                'pesel' => '11111111111',
                'adres' => 'Test adresu',
                'telefon' => '111111111',
                'data_urodzenia' => 20191214,
                'password' => bcrypt('test'),
            ]
        ]);
    }
}
