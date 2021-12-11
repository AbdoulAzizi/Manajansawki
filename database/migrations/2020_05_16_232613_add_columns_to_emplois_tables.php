<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToEmploisTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('emplois', function (Blueprint $table) {
            //
            $table->string('nomMat')->after('id');
            $table->string('groupe_etudiants')->after('nomMat');
            $table->string('capacite')->after('groupe_etudiants');
            $table->string('nomSalle')->after('capacite');
            $table->string('nomProf')->after('nomSalle');
            $table->Date('date')->after('nomProf');
            $table->string('periode')->after('date');
            $table->string('horaire')->after('periode');


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
        Schema::table('emplois', function (Blueprint $table) {
            //
            $table->dropColumn('nomMat');
            $table->dropColumn('groupe_etudiants');
            $table->dropColumn('capacite');
            $table->dropColumn('nomSalle');
            $table->dropColumn('nomProf');
            $table->dropColumn('date');
            $table->dropColumn('periode');
            $table->dropColumn('horaire');

        });
        Schema::table('emplois', function (Blueprint $table) {
            //
            // drop table if exists


        });
    }
}
