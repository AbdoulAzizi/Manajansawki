<?php

use Illuminate\Database\Seeder;
use App\Periode;
use App\Horaire;

class PeriodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Periode::truncate();
        Horaire::truncate();
        DB::table('horaire_periode')->truncate();
        Periode::create(['periode'=>'matin', 'horaire_id'=>'1']);
        Periode::create(['periode'=>'apres_midi', 'horaire_id'=>'3']);
        Periode::create(['periode'=>'soir', 'horaire_id'=>'2']);


        $matin = Periode::where('periode', 'matin')->first();
        $apres_midi = Periode::where('periode', 'apres_midi')->first();
        $soir = Periode::where('periode', 'soir')->first();

        $horaire1=Horaire::create([
            'horaire'=>'08H30-10H00'
        ]);
        $horaire2=Horaire::create([
            'horaire'=>'12H30-14H00'
        ]);
        $horaire3=Horaire::create([
            'horaire'=>'16H30-18H00'
        ]);
        $horaire4=Horaire::create([
            'horaire'=>'10H30-12H00'
        ]);

        $horaire1->periodes()->attach($matin);
        $horaire2->periodes()->attach($apres_midi);
        $horaire3->periodes()->attach($soir);
        $horaire4->periodes()->attach($matin);



    }
}
