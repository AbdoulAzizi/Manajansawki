<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdEtudiantToMatieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('etudiants', function (Blueprint $table) {
            //
            /*
            $table->unsignedBigInteger('matiere_id')->after('datenais');
            $table->foreign('matiere_id')->references('id')->on('matieres')->onDelete('cascade');
            Schema::enableForeignKeyConstraints();
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('etudiants', function (Blueprint $table) {
            //
            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['matiere_id']);
        });
    }
}
