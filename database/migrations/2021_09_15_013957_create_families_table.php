<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('people_id');
            $table->string('father_name');
            $table->string('grandfather_name')->nullable();
            $table->string('grandmother_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('wife_name')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();

            $table->foreign('people_id')->references('id')->on('people'); //if the parent data gets changed, it changed the child data too
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('families');
    }
}
