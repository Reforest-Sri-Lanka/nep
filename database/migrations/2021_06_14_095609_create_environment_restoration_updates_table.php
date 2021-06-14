<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnvironmentRestorationUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('environment_restoration_updates', function (Blueprint $table) {
            $table->id();
            $table->string('situation_update');
            $table->double('suggestions');
            $table->string('further_remarks');
            $table->timestamps();

            //connecting environment restoration species table to environment restorations
            $table->unsignedBigInteger('env_rest_id');
            $table->unsignedBigInteger('created_by');
            $table->foreign('env_rest_id','er_update')->references('id')->on('environment_restorations')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('environment_restoration_updates');
    }
}
