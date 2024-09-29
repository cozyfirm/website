<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BlogSlider extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog__slider', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('content_id')->unsigned();
            $table->foreign('content_id')
                ->references('id')
                ->on('blog__content')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('image_id');

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
        Schema::dropIfExists('blog__slider');
    }
}
