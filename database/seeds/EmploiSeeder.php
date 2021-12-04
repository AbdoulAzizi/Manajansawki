<?php

use Illuminate\Database\Seeder;

class EmploiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cours')->insert([
            'titre' => 'Cuisine',
            'date' => '2019-06-18',
            'heure' => '20',
            'matiere_id'=> '1',
            'salle_id'=>'1',
            'prof_id'=>'2',
        ]);
        DB::table('cours')->insert([
            'titre' => 'Couture',
            'date' => '2020-07-18',
            'heure' => '30',
            'matiere_id'=> '2',
            'salle_id'=>'2',
            'prof_id'=>'1',
        ]);

        DB::table('matieres')->insert([
            'nomMat' => 'Couture',
            'prof_id'=>'1',

        ]);
        DB::table('matieres')->insert([
            'nomMat' => 'Cuisine',
            'prof_id'=>'2',

        ]);
        DB::table('matieres')->insert([
            'nomMat' => 'Coiffure',
            'prof_id'=>'3',

        ]);

        DB::table('professeurs')->insert([
            'nomProf' => 'Youssif',
            'prenomProf' => 'Ali',
            'matiere_id'=>'1',
            'adresse' => 'Tétouan',
            'contact'=> '208625382',
        ]);
        DB::table('professeurs')->insert([
            'nomProf' => 'Mouhammad',
            'prenomProf' => 'Fatima',
            'matiere_id'=>'2',
            'adresse' => 'Martil',
            'contact'=> '20387632',
        ]);
        DB::table('salles')->insert([
            'nomSalle' => 'Salle Cuisine',
            'numSalle' => '12',
            'capacite'=>true,
            'etage'=>'1',
            'connexion'=>true,
            'projecteur'=>false

        ]);
        DB::table('salles')->insert([
            'nomSalle' => 'Salle Couture',
            'numSalle' => '23',
            'capacite'=>false,
            'etage'=>'2',
            'connexion'=>true,
            'projecteur'=>false
        ]);
        DB::table('salles')->insert([
            'nomSalle' => 'Salle Informatique',
            'numSalle' => '14',
            'capacite'=>true,
            'etage'=>'3',
            'connexion'=>false,
            'projecteur'=>true
        ]);
    }
}
