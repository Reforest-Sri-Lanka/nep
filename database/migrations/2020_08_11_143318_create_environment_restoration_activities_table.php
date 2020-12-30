<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnvironmentRestorationActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('environment_restoration_activities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
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
        Schema::dropIfExists('environment_restoration_activities');
    }
}
