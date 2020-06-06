<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationalEstablishmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educational_establishments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('facultet');
            $table->string('place');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->unsignedBigInteger('resume_id');
            $table->foreign('resume_id')->references('id')->on('resumes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('educational_establishments');
    }
}