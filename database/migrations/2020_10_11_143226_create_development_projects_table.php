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
            $table->string('gazette'); //ref gazettes
            $table->json('governing_organizations');
            $table->json('logs');
            $table->json('polygon');
            $table->integer('land_parcel'); //ref land_parcels
            $table->tinyInteger('protected_area');
            $table->integer('created_by_user_id');
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
        Schema::dropIfExists('development_projects');
    }
}
