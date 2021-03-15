<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandHasGazettesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_has_gazettes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gazette_id')->nullable();
            $table->unsignedBigInteger('land_parcel_id')->nullable();
            $table->timestampsTz(); //time stamp with timezone in UTC
            $table->tinyInteger('status');
            $table->softDeletesTz('deleted_at', 0);
            $table->foreign('land_parcel_id')->references('id')->on('land_parcels')->onDelete('cascade');
            $table->foreign('gazette_id')->references('id')->on('gazettes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('land_has_gazettes');
    }
}
