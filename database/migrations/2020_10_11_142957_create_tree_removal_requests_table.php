<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreeRemovalRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tree_removal_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('created_by_user_id');
            $table->string('description');
            $table->json('images');
            $table->string('province');
            $table->string('district');
            $table->string('gs_division');
            $table->double('land_size', 12,4);
            $table->string('land_size_unit');
            $table->json('special_approval')->nullable();// 1: EIA 2:SEA, 
            $table->integer('no_of_fauna_species');
            $table->json('fauna');
            $table->integer('no_of_flora_species');
            $table->json('flora');
            $table->string('land_parcel_id');
            $table->json('location');
            $table->timestampsTz(); //time stamp with timezone in UTC
            $table->tinyInteger('status');
            $table->softDeletesTz('deleted_at', 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tree_removal_requests');
    }
}
