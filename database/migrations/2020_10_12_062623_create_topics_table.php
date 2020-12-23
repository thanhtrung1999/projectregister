<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->string('topic_code')->nullable();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('lecturer_id');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('lecturer_id')->references('id')->on('lecturers');
            $table->integer('topic_status')->nullable();
            $table->timestamp('date')->nullable();
            $table->timestamp('extend_date')->nullable();
            $table->integer('cancel_topic_status')->nullable();
            $table->integer('extend_topic_status')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topics');
    }
}
