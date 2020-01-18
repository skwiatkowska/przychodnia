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
                'godzina_minuta'=>'11:00',
                'opis'=> 'Pacjent skarży się na przetłuszczającą się cerę oraz pojawiające się plamy rumieniowe o nieregularnym kształcie.
				Zmianom tym towarzyszy świąd. Stwierdzono Łojotokowe Zapalenie Skóry.',
                'zalecenia'=>'Stosować specjalne płyny do mycia twarzy.',
            ], [
                'id_lekarza'=> 1,
                'id_pacjenta'=> 12,
                'rok_miesiac_dzien'=>20191228,
                'godzina_minuta'=>'17:00',
                'opis'=>'Pacjent skarży się na nadmierne łuszczenie się skóry głowy objawiające się łupieżem.
				Płytki łusek są suche i białawe, dodatkowo towarzyszą im zaczerwienienia oraz świąd. Stwierdzono łuszczycę.',
                'zalecenia'=>'Stosować szampon z substancjami czynnymi, keratoreduktorami.',
            ], [
                'id_lekarza'=> 2,
                'id_pacjenta'=> 5,
                'rok_miesiac_dzien'=>20191229,
                'godzina_minuta'=>'12:00',
                'opis'=>'Dziecko ma katar, kaszel oraz stan podgorączkowy.',
                'zalecenia'=>'Stosować syrop na kaszel oraz krople do nosa.',
            ], [
                'id_lekarza'=> 3,
                'id_pacjenta'=> 5,
                'rok_miesiac_dzien'=>20191222,
                'godzina_minuta'=>'16:00',
                'opis'=>'Pacjent skarży się na nawracające silne bóle głowy, którym towarzyszą omdlenia. Występują również
				zawroty głowy i zaburzenia równowagi. Wymagane dalsze badania w celu rozpoznania przyczyn.',
                'zalecenia'=>'Wykonać tomografię komputerową głowy.',
            ], [
                'id_lekarza'=> 3,
                'id_pacjenta'=> 12,
                'rok_miesiac_dzien'=>20191222,
                'godzina_minuta'=>'16:30',
                'opis'=>'Pacjent skarży się na nawracające silne bóle głowy, którym towarzyszą omdlenia. Występują również
				zawroty głowy i zaburzenia równowagi. Wymagane dalsze badania w celu rozpoznania przyczyn.',
                'zalecenia'=>'Wykonać tomografię komputerową głowy.',
		 ], [
                'id_lekarza'=> 3,
                'id_pacjenta'=> 4,
                'rok_miesiac_dzien'=>20191221,
                'godzina_minuta'=>'10:30',
                'opis'=>'Pacjent skarży się na nawracające silne bóle głowy, którym towarzyszą omdlenia. Występują również
				zawroty głowy i zaburzenia równowagi. Wymagane dalsze badania w celu rozpoznania przyczyn.',
                'zalecenia'=>'Wykonać tomografię komputerową głowy.',

            ], [
                'id_lekarza'=> 3,
                'id_pacjenta'=> 7,
                'rok_miesiac_dzien'=>20191221,
                'godzina_minuta'=>'11:30',
                'opis'=>'Pacjent skarży się na nawracające silne bóle głowy, którym towarzyszą omdlenia. Występują również
				zawroty głowy i zaburzenia równowagi. Wymagane dalsze badania w celu rozpoznania przyczyn.',
                'zalecenia'=>'Wykonać tomografię komputerową głowy.',
            ], [
                'id_lekarza'=> 4,
                'id_pacjenta'=> 7,
                'rok_miesiac_dzien'=>20191227,
                'godzina_minuta'=>'17:30',
                'opis'=>'Pacjent skarży się na ból i drętwienie palców dłoni, występujący szczególnie w nocy. Ból promieniuje
				do przedramienia. Po przeprowadzeniu testów sprawności manualnej i czucia w palcach, stwierdzono zespół cieśni nadgarstka.',
                'zalecenia'=>'Ręka powinna zostać unieruchomiona w ortezie. Należy przyjmować niesteroidowe leki przeciwzapalne.',
            ], [
                'id_lekarza'=> 4,
                'id_pacjenta'=> 12,
                'rok_miesiac_dzien'=>20191227,
                'godzina_minuta'=>'18:30',
                'opis'=>'Pacjent skarży się na ból i drętwienie palców dłoni, występujący szczególnie w nocy. Ból promieniuje
				do przedramienia. Po przeprowadzeniu testów sprawności manualnej i czucia w palcach, stwierdzono zespół cieśni nadgarstka.',
                'zalecenia'=>'Ręka powinna zostać unieruchomiona w ortezie. Należy przyjmować niesteroidowe leki przeciwzapalne.',
		 ], [
                'id_lekarza'=> 6,
                'id_pacjenta'=> 7,
                'rok_miesiac_dzien'=>20200112,
                'godzina_minuta'=>'13:30',
                'opis'=>'Pacjent skarży się na kołatanie serca - szybkie, niemiarowe bicie serca. Ponadto występuje uczucie
				kłucia w okolicy serca, duszności oraz zawroty głowy. Podejrzenie arytmii serca, należy wykonać dodatkowe badania.',
                'zalecenia'=>'Wykonać EKG.',
            ], [
                'id_lekarza'=> 6,
                'id_pacjenta'=> 12,
                'rok_miesiac_dzien'=>20200114,
                'godzina_minuta'=>'12:30',
                'opis'=>'Pacjent skarży się na kołatanie serca - szybkie, niemiarowe bicie serca. Ponadto występuje uczucie
				kłucia w okolicy serca, duszności oraz zawroty głowy. Podejrzenie arytmii serca, należy wykonać dodatkowe badania.',
                'zalecenia'=>'Wykonać EKG.',

            ], [
                'id_lekarza'=> 5,
                'id_pacjenta'=> 12,
                'rok_miesiac_dzien'=>20191227,
                'godzina_minuta'=>'10:30',
                'opis'=>'Pacjent skarży się na wypadanie włosów oraz nagły przyrost masy ciała. Dodatkowo występuje
				senność i ciągłe zmęczenie. Podejrzenie Hashimoto.',
                'zalecenia'=>'Wykonać badania krwi: TSH,ft3,ft4,anty-TPO oraz USG tarczycy.',
            ]
            , [
                'id_lekarza'=> 1,
                'id_pacjenta'=> 12,
                'rok_miesiac_dzien'=>20200119,
                'godzina_minuta'=>'10:30',
                'opis'=>' ',
                'zalecenia'=>' ',
            ], [
                'id_lekarza'=> 1,
                'id_pacjenta'=> 4,
                'rok_miesiac_dzien'=>20200119,
                'godzina_minuta'=>'12:00',
                'opis'=>' ',
                'zalecenia'=>' ',
            ], [
                'id_lekarza'=> 1,
                'id_pacjenta'=> 5,
                'rok_miesiac_dzien'=>20200119,
                'godzina_minuta'=>'12:30',
                'opis'=>' ',
                'zalecenia'=>' ',
            ], [
                'id_lekarza'=> 2,
                'id_pacjenta'=> 6,
                'rok_miesiac_dzien'=>20200119,
                'godzina_minuta'=>'8:30',
                'opis'=>' ',
                'zalecenia'=>' ',
            ], [
                'id_lekarza'=> 2,
                'id_pacjenta'=> 7,
                'rok_miesiac_dzien'=>20200119,
                'godzina_minuta'=>'10:30',
                'opis'=>' ',
                'zalecenia'=>' ',
            ], [
                'id_lekarza'=> 6,
                'id_pacjenta'=> 12,
                'rok_miesiac_dzien'=>20200120,
                'godzina_minuta'=>'10:30',
                'opis'=>' ',
                'zalecenia'=>' ',
            ], [
                'id_lekarza'=> 6,
                'id_pacjenta'=> 7,
                'rok_miesiac_dzien'=>20200120,
                'godzina_minuta'=>'9:30',
                'opis'=>' ',
                'zalecenia'=>' ',
            ], [
                'id_lekarza'=> 6,
                'id_pacjenta'=> 6,
                'rok_miesiac_dzien'=>20200120,
                'godzina_minuta'=>'11:30',
                'opis'=>' ',
                'zalecenia'=>' ',
            ], [
                'id_lekarza'=> 5,
                'id_pacjenta'=> 4,
                'rok_miesiac_dzien'=>20200121,
                'godzina_minuta'=>'9:30',
                'opis'=>' ',
                'zalecenia'=>' ',
            ], [
                'id_lekarza'=> 4,
                'id_pacjenta'=> 7,
                'rok_miesiac_dzien'=>20200121,
                'godzina_minuta'=>'12:30',
                'opis'=>' ',
                'zalecenia'=>' ',
            ], [
                'id_lekarza'=> 4,
                'id_pacjenta'=> 6,
                'rok_miesiac_dzien'=>20200121,
                'godzina_minuta'=>'13:00',
                'opis'=>' ',
                'zalecenia'=>' ',
            ], [
                'id_lekarza'=> 3,
                'id_pacjenta'=> 7,
                'rok_miesiac_dzien'=>20200121,
                'godzina_minuta'=>'10:30',
                'opis'=>' ',
                'zalecenia'=>' ',
            ], [
                'id_lekarza'=> 3,
                'id_pacjenta'=> 4,
                'rok_miesiac_dzien'=>20200121,
                'godzina_minuta'=>'10:00',
                'opis'=>' ',
                'zalecenia'=>' ',
            ], [
                'id_lekarza'=> 3,
                'id_pacjenta'=> 6,
                'rok_miesiac_dzien'=>20200121,
                'godzina_minuta'=>'13:30',
                'opis'=>' ',
                'zalecenia'=>' ',
            ], [
                'id_lekarza'=> 3,
                'id_pacjenta'=> 7,
                'rok_miesiac_dzien'=>20200119,
                'godzina_minuta'=>'16:30',
                'opis'=>' ',
                'zalecenia'=>' ',
            ], [
                'id_lekarza'=> 3,
                'id_pacjenta'=> 6,
                'rok_miesiac_dzien'=>20200119,
                'godzina_minuta'=>'16:00',
                'opis'=>' ',
                'zalecenia'=>' ',
            ], [
                'id_lekarza'=> 3,
                'id_pacjenta'=> 5,
                'rok_miesiac_dzien'=>20200119,
                'godzina_minuta'=>'15:30',
                'opis'=>' ',
                'zalecenia'=>' ',
            ], [
                'id_lekarza'=> 3,
                'id_pacjenta'=> 12,
                'rok_miesiac_dzien'=>20200119,
                'godzina_minuta'=>'15:00',
                'opis'=>' ',
                'zalecenia'=>' ',
            ], [
                'id_lekarza'=> 3,
                'id_pacjenta'=> 4,
                'rok_miesiac_dzien'=>20200119,
                'godzina_minuta'=>'14:30',
                'opis'=>' ',
                'zalecenia'=>' ',
            ], [
                'id_lekarza'=> 6,
                'id_pacjenta'=> 12,
                'rok_miesiac_dzien'=>20200120,
                'godzina_minuta'=>'17:00',
                'opis'=>' ',
                'zalecenia'=>' ',
            ]
        ]);
    }
}