<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrimeReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crime_reports', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('action_taken');
            $table->json('photos');
            $table->json('logs');
            $table->text('description');
            $table->integer('created_by_user_id');
            $table->timestampsTz(); //time stamp with timezone in UTC
            $table->tinyInteger('status');
            $table->softDeletesTz('deleted_at', 0);
            //connecting with the crime types
            $table->unsignedBigInteger('crime_type_id')->nullable();
            $table->foreign('crime_type_id')->references('id')->on('crime_types')->onDelete('cascade');
            //connecring to the land parcel
            $table->unsignedBigInteger('land_parcel_id')->nullable();
            $table->foreign('land_parcel_id')->references('id')->on('land_parcels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crime_reports');
    }
}

