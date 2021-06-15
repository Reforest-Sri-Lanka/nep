<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnvironmentRestorationSpeciesUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('environment_restoration_species_updates', function (Blueprint $table) {
            $table->id();
            $table->double('current_height');
            $table->string('height_unit')->nullable();
            $table->string('improvement_suggestions')->nullable();
            $table->double('qty_of_successful_trees')->nullable();
            $table->string('futher_remarks')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('env_rest_update_id');
            $table->unsignedBigInteger('env_rest_species_id')->nullable();
            $table->foreign('env_rest_update_id','er_update_er')->references('id')->on('environment_restoration_updates')->onDelete('cascade');
            $table->foreign('env_rest_species_id','er_spcs_update_spcs')->references('id')->on('environment_restoration_species')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('environment_restoration_species_updates');
    }
}
