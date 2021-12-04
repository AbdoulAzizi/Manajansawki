<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'Directeur')->first();
        $secretariatRole = Role::where('name', 'Secretariat')->first();
        $financeRole = Role::where('name', 'Finance')->first();
        $enseignantRole = Role::where('name', 'Enseignant')->first();
        $etudiantRole = Role::where('name', 'Etudiant')->first();



        $admin=User::create([
            'name' => 'Admin User',
            'email'=> 'admin@admin.com',
            'password' => Hash::make('password')
        ]);
        $enseignant=User::create([
            'name' => 'Enseignant User',
            'email'=> 'enseignant@enseignant.com',
            'password' => Hash::make('password')
        ]);
        $etudiant=User::create([
            'name' => 'Etudiant User',
            'email'=> 'etudiant@etudiant.com',
            'password' => Hash::make('password')
        ]);



        $author=User::create([
            'name' => 'Author User',
            'email'=> 'author@author.com',
            'password' => Hash::make('password')
        ]);

        $user=User::create([
            'name' => 'Generic User',
            'email'=> 'user@user.com',
            'password' => Hash::make('password')
        ]);

        $admin->roles()->attach($adminRole);
        $author->roles()->attach($secretariatRole);
        $user->roles()->attach($financeRole);
        $enseignant->roles()->attach($enseignantRole);
        $etudiant->roles()->attach($etudiantRole);

    }
}
