<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnvironmentRestorationSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('environment_restoration_species', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('status');
            $table->string('height');
            $table->string('dimensions');
            $table->double('quantity');
            $table->string('remarks');
            

            //connecting environment restoration species table to environment restorations
            $table->unsignedBigInteger('environment_restoration_id');
            $table->unsignedBigInteger('species_id');
            $table->foreign('environment_restoration_id','er_id')->references('id')->on('environment_restorations')->onDelete('cascade');
            $table->foreign('species_id')->references('id')->on('species_information')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('environment_restoration_species');
    }
}
