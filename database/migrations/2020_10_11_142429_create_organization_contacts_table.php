<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('org_id');
            $table->string('type');  //fax, mobile, direct no, address, email
            $table->string('contact_signature'); //number, email string, address string
            $table->boolean('primary');
            $table->timestampsTz(); //time stamp with timezone in UTC
            $table->tinyInteger('status');
            $table->softDeletesTz('deleted_at', 0);
            $table->foreign('org_id')->references('id')->on('organizations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organization_contacts');
    }
}