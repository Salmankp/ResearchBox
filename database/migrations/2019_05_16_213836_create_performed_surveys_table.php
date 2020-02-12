<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformedSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('performed_surveys', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('survey_id')->nullable();
          $table->unsignedInteger('researcher_id')->nullable();
          $table->string('researcher_name');
          $table->string('designation');
          $table->string('survey_name');
          $table->string('searcher_name');
          $table->string('searcher_email');
          $table->string('searcher_description');
          $table->string('searcher_qualification');
          $table->string('searcher_age');
          $table->string('file');


          $table->timestamps();


          $table->foreign('survey_id')->references('id')->on('surveys');
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
        Schema::dropIfExists('performed_surveys');
    }
}
