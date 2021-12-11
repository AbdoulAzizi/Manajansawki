<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeysForPhRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('horaire_periode', function (Blueprint $table) {
            /*
            $table->foreign('horaire_id')->references('id')->on('horaires')->onDelete('cascade');
            $table->foreign('periode_id')->references('id')->on('periodes')->onDelete('cascade');
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
        Schema::table('horaire_periode', function (Blueprint $table){

            // $table->dropForeign('horaire_periode_horaire_id_foreign');
            // $table->dropForeign('horaire_periode_periode_id_foreign');

        });
    }
}
