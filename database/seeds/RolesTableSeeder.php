<?php

use Illuminate\Database\Seeder;
use App\Role;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::truncate();
        Role::create(['name'=>'Directeur']);
        Role::create(['name'=>'Secretariat']);
        Role::create(['name'=>'Finance']);
        Role::create(['name'=>'Enseignant']);
        Role::create(['name'=>'Etudiant']);

    }
}
