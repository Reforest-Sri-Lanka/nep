<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGazettesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gazettes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('gazette_number');
            $table->date('gazetted_date');
            $table->date('degazetted_date')->nullable();
            $table->json('organizations');
            $table->text('content');
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
        Schema::dropIfExists('gazettes');
    }
}
