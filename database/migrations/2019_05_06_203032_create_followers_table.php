<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('followers', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('researcher_id')->nullable();
          $table->unsignedInteger('searcher_id')->nullable();
          $table->timestamps();

          $table->foreign('researcher_id')->references('id')->on('researchers');
          $table->foreign('searcher_id')->references('id')->on('searchers');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('followers');
    }
}
