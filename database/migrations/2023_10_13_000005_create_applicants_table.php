<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('gender')->nullable();
            $table->string('ans_1')->nullable();
            $table->string('ans_2')->nullable();
            $table->string('ans_3')->nullable();
            $table->string('ans_4')->nullable();
            $table->string('ans_5')->nullable();
            $table->integer('question_id_1')->nullable();
            $table->integer('question_id_2')->nullable();
            $table->integer('question_id_3')->nullable();
            $table->integer('question_id_4')->nullable();
            $table->integer('question_id_5')->nullable();
            $table->integer('total_marks')->nullable();
            $table->integer('time')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
