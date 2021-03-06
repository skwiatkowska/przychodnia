<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Anna',
                'email' => 'nowak@przychodnia.pl',
                'password' => bcrypt('nowak'),
                'user_type' => 'doctor',
                'status' => 'active',
            ], [
                'name' => 'Jan',
                'email' => 'kowalski@przychodnia.pl',
                'password' => bcrypt('kowalski'),
                'user_type' => 'doctor',
                'status' => 'active',

            ], [
                'imie' => 'recepcja',
                'email' => 'recepcja@przychodnia.pl',
                'password' => bcrypt('admin'),
                'user_type' => 'reception',
                'status' => 'active',

            ], [
                'imie' => 'Blanka',
                'email' => 'blanka@losowymail.com',
                'password' => bcrypt('blanka'),
                'user_type' => "patient",
                'status' => 'active',

            ], [
                'imie' => 'Patryk Piotrowski',
                'email' => 'patryk@patryk.com',
                'password' => bcrypt('patryk'),
                'user_type' => "patient",
                'status' => 'active',

            ], [
                'imie' => 'Łucja',
                'email' => 'lucja@kowalczyk.com',
                'password' => bcrypt('lucja'),
                'user_type' => "patient",
                'status' => 'inactive',

            ], [
                'imie' => 'Antoni',
                'email' => 'antoni@antek.com',
                'password' => bcrypt('antoni'),
                'user_type' => "patient",
                'status' => 'active',

            ], [
                'imie' => 'Lech',
                'email' => 'lekarski@przychodnia.pl',
                'password' => bcrypt('lekarski'),
                'user_type' => 'doctor',
                'status' => 'active',


            ], [
                'imie' => 'Joanna',
                'email' => 'leczaca@przychodnia.pl',
                'password' => bcrypt('leczaca'),
                'user_type' => 'doctor',
                'status' => 'active',

            ], [
                'imie' => 'Jadwiga',
                'email' => 'jadwigowska@przychodnia.pl',
                'password' => bcrypt('jadwigowska'),
                'user_type' => 'doctor',
                'status' => 'active',

            ], [
                'imie' => 'Kazimierz',
                'email' => 'zabiegowy@przychodnia.pl',
                'password' => bcrypt('zabiegowy'),
                'user_type' => 'doctor',
                'status' => 'active',

            ], [
                'imie' => 'Test',
                'email' => 'test@test.test',
                'password' => bcrypt('test'),
                'user_type' => 'patient',
                'status' => 'active',

            ]
        ]);
    }
}
