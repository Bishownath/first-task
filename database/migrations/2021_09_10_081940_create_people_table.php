<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('address_2')->nullable();
            $table->string('email');
            $table->string('phone_number')->nullable();
            $table->string('mobile_number');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('municipality_id');
            $table->string('age');
            $table->string('gender');
            $table->string('citizenship_number');
            $table->string('passport_number')->nullable();
            $table->string('image')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('date_of_birth');
            $table->string('grandfather_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('issue_date')->nullable();
            $table->string('validity_date')->nullable();
            $table->string('issued_from')->nullable();
            $table->string('issued_by')->nullable();
            $table->timestamps();

            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('municipality_id')->references('id')->on('municipalities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
