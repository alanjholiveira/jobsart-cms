<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlideshowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slideshow', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 50);
            $table->string('subtitle', 50);
            $table->enum('logoimage', ['Y', 'N'])->default('N');
			$table->string('imagefile');
            $table->string('status', 20)->default('unpublished');
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
        Schema::drop('slideshow');
    }
}
