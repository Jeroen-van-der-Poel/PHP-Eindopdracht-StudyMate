<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('year')->nullable();
            $table->integer('period');
            $table->unsignedBigInteger('coordinator');
            $table->unsignedBigInteger('teacher');
            $table->unsignedBigInteger('exam_method_id');
            $table->decimal('study_points');
            $table->decimal('points_received')->nullable();
            $table->decimal('grade')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();

            $table->foreign('coordinator')->references('id')->on('teachers')->onDelete('cascade');
            $table->foreign('teacher')->references('id')->on('teachers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
