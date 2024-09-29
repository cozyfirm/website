<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Blog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->id();

            $table->integer('category');
            $table->integer('image_id');
            $table->integer('home_image_id');
            $table->string('title', 150);
            $table->string('title_en', 150);
            $table->text('short_description')->nullable();
            $table->text('short_description_en')->nullable();
            $table->integer('published')->default(0);
            $table->integer('views')->default(0);
            $table->integer('created_by');

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
        Schema::dropIfExists('blog');
    }
}
