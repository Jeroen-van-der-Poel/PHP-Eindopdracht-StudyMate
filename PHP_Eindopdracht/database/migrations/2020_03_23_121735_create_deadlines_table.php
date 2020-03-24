<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeadlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deadlines', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('teacherid');
            $table->unsignedBigInteger('courseid');
            $table->dateTime('duedate');
            $table->string('categorie')->nullable();
            $table->dateTime('finished')->nullable();
            $table->timestamps();

            $table->foreign('teacherid')->references('id')->on('teachers')->onDelete('cascade');
            $table->foreign('courseid')->references('id')->on('courses')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deadlines');
    }
}
