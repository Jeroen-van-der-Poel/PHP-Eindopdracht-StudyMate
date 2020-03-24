<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeadlineTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deadline_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('deadline_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();

            $table->unique(['deadline_id', 'tag_id']);

            $table->foreign('deadline_id')->references('id')->on('deadlines')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deadline_tag');
    }
}
