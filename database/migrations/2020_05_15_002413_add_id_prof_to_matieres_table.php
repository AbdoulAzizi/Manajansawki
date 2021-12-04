<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdProfToMatieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matieres', function (Blueprint $table) {
            // //
            // $table->unsignedBigInteger('prof_id')->after('nomMat');
            // $table->foreign('prof_id')->references('id')->on('professeurs')->onDelete('cascade');
            // Schema::enableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matieres', function (Blueprint $table) {
            //
            // Schema::disableForeignKeyConstraints();
            // $table->dropForeign(['prof_id']);
        });
    }
}
