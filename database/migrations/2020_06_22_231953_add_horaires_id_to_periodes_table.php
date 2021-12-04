<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHorairesIdToPeriodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        Schema::table('periodes', function (Blueprint $table) {
            //

            $table->unsignedBigInteger('horaire_id')->after('periode');
            $table->foreign('horaire_id')->references('id')->on('horaires')->onDelete('cascade');
            Schema::enableForeignKeyConstraints();
        });
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('periodes', function (Blueprint $table) {
            //
            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['horaire_id']);
        });
    }
}
