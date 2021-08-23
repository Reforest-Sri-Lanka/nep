<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeciesInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('species_information', function (Blueprint $table) {
            $table->id();
            $table->string('type'); //flora/ fauna
            $table->string('title');
            $table->string('scientefic_name');
            $table->json('habitats');
            $table->json('taxa');
            $table->text('description')->nullable();
            $table->integer('created_by_user_id');
            $table->timestampsTz(); //time stamp with timezone in UTC
            $table->integer('status_id')->nullable(); // ref process_item_statuses
            $table->softDeletesTz('deleted_at', 0);
            $table->unsignedBigInteger('district_id')->nullable();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->string('images')->nullable();
            $table->json('polygon')->nullable();
            $table->tinyInteger('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('species_information');
    }
}
