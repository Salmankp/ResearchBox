<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformedAssistancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('performed_assistances', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('assistance_id')->nullable();
          $table->unsignedInteger('searcher_id')->nullable();
          $table->string('searcher_name');
          $table->string('searcher_email');
          $table->string('searcher_qualification');
          $table->string('assistance_description');
          $table->string('assistance_name');
          $table->string('researcher_name');
          $table->string('researcher_qualification');
          $table->string('researcher_description');
          $table->string('file');

          $table->timestamps();

          $table->foreign('assistance_id')->references('id')->on('assistances');
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
        Schema::dropIfExists('performed_assistances');
    }
}
