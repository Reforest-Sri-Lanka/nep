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
             //land_owner
            //$table->integer('activity_organization'); //removal_requestor
            //$table->integer('activity_user_id');
            $table->string('remark');
            $table->boolean('prerequisite'); //false
            //$table->integer('prerequisite_id'); //0
            $table->timestampsTz(); //time stamp with timezone in UTC
            //$table->tinyInteger('status'); //pending, processing,, pending-prerequisite, approved, rejected, cancelled
            $table->softDeletesTz('deleted_at', 0);
            $table->integer('other_land_owner_type');
            $table->string('other_land_owner_name');
            $table->integer('other_removal_requestor_type');
            $table->string('other_removal_requestor_name');
            $table->string('requestor_email');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->unsignedBigInteger('form_type_id')->nullable();
            $table->unsignedBigInteger('created_by_user_id')->nullable();
            $table->unsignedBigInteger('request_organization')->nullable();
            $table->unsignedBigInteger('activity_organization')->nullable();
            $table->unsignedBigInteger('prerequisite_id')->nullable();
            $table->unsignedBigInteger('activity_user_id')->nullable();
            $table->foreign('status_id')->references('id')->on('status')->onDelete('cascade');
            $table->foreign('form_type_id')->references('id')->on('form_types')->onDelete('cascade');
            $table->foreign('created_by_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('request_organization')->references('id')->on('organizations')->onDelete('cascade');
            $table->foreign('activity_organization')->references('id')->on('organizations')->onDelete('cascade');
            $table->foreign('prerequisite_id')->references('id')->on('process_items')->onDelete('cascade');
            $table->foreign('activity_user_id')->references('id')->on('users')->onDelete('cascade');
          
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
