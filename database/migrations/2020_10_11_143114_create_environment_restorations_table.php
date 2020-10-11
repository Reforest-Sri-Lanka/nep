<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnvironmentRestorationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('environment_restorations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('er_activity');
            $table->integer('eco_system');
            $table->integer('organization'); 
            $table->integer('created_by_user_id');
            $table->json('species');
            /*
                {[species_id, count, remarks, amendments, amended_by, amended_on]}
            */
            $table->timestampTz('approval_at'); //null-pending, approved/ rejected time
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
        Schema::dropIfExists('environment_restorations');
    }
}
