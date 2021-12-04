<?php

use Illuminate\Database\Seeder;

class PHrelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('periodes_horaires')->insert([
            'periode' => 'matin',
            'horaire' => '08H30-10H00',
        ]);
        DB::table('periodes_horaires')->insert([
            'periode' => 'matin',
            'horaire' => '01H30-12H00',
        ]);
        DB::table('periodes_horaires')->insert([
            'periode' => 'apres-midi',
            'horaire' => '12H30-14H00',
        ]);
        DB::table('periodes_horaires')->insert([
            'periode' => 'soir',
            'horaire' => '04H30-16H00',
        ]);
        DB::table('periodes_horaires')->insert([
            'periode' => 'soir',
            'horaire' => '06H30-18H00',
        ]);



    }
}
