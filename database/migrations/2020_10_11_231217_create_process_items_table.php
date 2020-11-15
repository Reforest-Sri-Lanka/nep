<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('process_items', function (Blueprint $table) {
            $table->id();
            $table->integer('form_type');
            $table->integer('form_id');
            $table->integer('created_by_user_id');
            $table->integer('requst_organization'); //ref organizations
            $table->integer('activity_organization'); //ref organizations
            $table->integer('activity_user_id');
            $table->string('remark');
            $table->boolean('prerequisite'); //false
            $table->integer('prerequsite_id'); //0
            $table->timestampsTz(); //time stamp with timezone in UTC
            $table->tinyInteger('status'); //pending, processing,, pending-prerequisite, approved, rejected, cancelled
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
        Schema::dropIfExists('process_items');
    }
}
