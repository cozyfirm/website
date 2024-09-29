<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BlogDoubleImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog__double_images', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('content_id')->unsigned();
            $table->foreign('content_id')
                ->references('id')
                ->on('blog__content')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('image_left');
            $table->integer('image_right');

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
        Schema::dropIfExists('blog__double_images');
    }
}
