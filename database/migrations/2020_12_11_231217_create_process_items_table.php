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
            //$table->integer('form_type');
            $table->integer('form_id');
            $table->integer('created_by_user_id');
            $table->integer('request_organization'); //land_owner
            $table->integer('activity_organization'); //removal_requestor
            $table->integer('activity_user_id');
            $table->string('remark');
            $table->boolean('prerequisite'); //false
            $table->integer('prerequsite_id'); //0
            $table->timestampsTz(); //time stamp with timezone in UTC
            //$table->tinyInteger('status'); //pending, processing,, pending-prerequisite, approved, rejected, cancelled
            $table->softDeletesTz('deleted_at', 0);
            $table->unsignedBigInteger('form_type_id')->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            // $table->unsignedBigInteger('created_by_user_id')->nullable();
            // $table->unsignedBigInteger('requst_organization')->nullable();
            // $table->unsignedBigInteger('activity_organization')->nullable();
            // $table->unsignedBigInteger('prerequsite_id')->nullable();
            // $table->unsignedBigInteger('activity_user_id')->nullable();
            $table->foreign('status_id')->references('id')->on('status')->onDelete('cascade');
            $table->foreign('form_type_id')->references('id')->on('form_types')->onDelete('cascade');
            // $table->foreign('created_by_user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('requst_organization')->references('id')->on('organizations')->onDelete('cascade');
            // $table->foreign('activity_organization')->references('id')->on('organizations')->onDelete('cascade');
            // $table->foreign('prerequsite_id')->references('id')->on('process_items')->onDelete('cascade');
            // $table->foreign('activity_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('other_land_owner_type');
            $table->string('other_land_owner_name');
            $table->integer('other_removal_requestor_type');
            $table->string('other_removal_requestor_name');
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
