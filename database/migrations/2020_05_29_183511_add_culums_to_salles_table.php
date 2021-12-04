<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCulumsToSallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salles', function (Blueprint $table) {
            //
            $table->integer('capacite')->after('numSalle');
            $table->string('etage')->nullable()->after('capacite');
            $table->boolean('connexion')->default(0)->after('etage');
            $table->boolean('projecteur')->default(0)->after('connexion');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('salles', function (Blueprint $table) {
            //
            $table->dropColumn('capacite');
            $table->dropColumn('etage');
            $table->dropColumn('connexion');
            $table->dropColumn('projecteur');


        });
    }
}
