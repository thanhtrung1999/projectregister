<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmitReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submit_reports', function (Blueprint $table) {
            $table->id();
            $table->integer('topic_id');
//            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
            $table->text('file')->nullable();
            $table->text('description')->nullable(); // ten , noi dung do an
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('submit_reports');
    }
}
