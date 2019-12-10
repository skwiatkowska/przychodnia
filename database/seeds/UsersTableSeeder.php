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
            ], [
                'name' => 'Jan',

                'email' => 'kowalski@przychodnia.pl',
                'password' => bcrypt('kowalski'),
                'user_type' => 'doctor',
            ], [
                'imie' => 'recepcja',
                'email' => 'recepcja@przychodnia.pl',
                'password' => bcrypt('admin'),
                'user_type' => 'reception',
            ], [
                'imie' => 'xxx',
                'email' => 'x@x.x',
                'password' => bcrypt('xxx'),
                'user_type' => "patient",
            ]
        ]);
    }
}
