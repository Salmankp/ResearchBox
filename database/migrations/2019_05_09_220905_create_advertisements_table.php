<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('advertisements', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('researcher_id')->nullable();
          $table->string('researcher_name');
          $table->string('email');
          $table->string('phone');
          $table->string('designation');
          $table->string('advertisement_name');
          $table->string('type');
          $table->string('description');
          $table->string('advertisement_img');
          $table->timestamps();

          $table->foreign('researcher_id')->references('id')->on('researchers');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisements');
    }
}
