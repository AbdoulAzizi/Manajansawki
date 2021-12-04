<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupesEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groupes_etudiants', function (Blueprint $table) {
            $table->bigIncrements('id');
            // gourp name
            $table->String('groupe_name');
            $table->index('matiere_id');
            $table->foreign('matiere_id')->references('id')->on('matieres')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        // drop table
        Schema::dropIfExists('groupes_etudiants');
        Schema::table('groupes_etudiants', function (Blueprint $table){

            $table->dropForeign('groupes_etudiants_matiere_id_foreign');

        });
    }
}
