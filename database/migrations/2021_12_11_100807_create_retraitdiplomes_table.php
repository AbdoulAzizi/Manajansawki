<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetraitdiplomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retrait_diplomes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomEtudiant');
            $table->string('prenomEtudiant');
            $table->string('nomMat');
            $table->string('numeroDiplome');
            $table->Date('dateRetrait');
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
        Schema::dropIfExists('retrait_diplomes');
    }
}
