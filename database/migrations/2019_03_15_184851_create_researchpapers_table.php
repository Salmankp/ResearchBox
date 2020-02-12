<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchpapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('researchpapers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('researcher_id')->nullable();
            $table->string('researcher_name');
            $table->string('email');
            $table->string('phone');
            $table->string('designation');
            $table->string('article_name');
            $table->integer('isbn')->unique();
            $table->string('article_title');
            $table->string('co_authors')->nullable();
            $table->string('co_author1')->nullable();
            $table->string('co_author1_email')->nullable();
            $table->string('co_author1_designation')->nullable();
            $table->string('co_author2')->nullable();
            $table->string('co_author2_email')->nullable();
            $table->string('co_author2_designation')->nullable();
            $table->string('service');
            $table->string('journal_name')->nullable();
            $table->string('journal_publisher')->nullable();
            $table->string('journal_publish_date')->nullable();
            $table->string('conference_name')->nullable();
            $table->string('conference_date')->nullable();
            $table->string('conference_location')->nullable();
            $table->string('conference_supervisor')->nullable();
            $table->string('institution')->nullable();
            $table->string('type');
            $table->string('institute');
            $table->string('payment_type');
            $table->string('price')->nullable();
            $table->integer('status')->default(0);
            $table->string('pic')->default('pdf.jpg');
            $table->string('file');

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
        Schema::dropIfExists('researchpapers');
    }
}
