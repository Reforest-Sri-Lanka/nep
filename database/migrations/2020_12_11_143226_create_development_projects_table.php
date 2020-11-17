<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevelopmentProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('development_projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            //$table->integer('gazette'); //ref gazettes
            $table->json('governing_organizations');
            $table->json('logs');
            //$table->integer('land_parcel_id'); //ref land_parcels
            $table->tinyInteger('protected_area');
            $table->integer('created_by_user_id');
            $table->timestampsTz(); //time stamp with timezone in UTC
            //$table->tinyInteger('status');
            $table->softDeletesTz('deleted_at', 0);

            $table->unsignedBigInteger('gazette_id')->nullable();            
            $table->unsignedBigInteger('status_id')->nullable();
            $table->unsignedBigInteger('land_parcel_id')->nullable();
            $table->foreign('gazette_id')->references('id')->on('gazettes')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('status')->onDelete('cascade');
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
        Schema::dropIfExists('development_projects');
    }
}
