<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BlogHeaders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog__headers', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('content_id')->unsigned();
            $table->foreign('content_id')
                ->references('id')
                ->on('blog__content')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('header');
            $table->string('header_en')->nullable();

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
        Schema::dropIfExists('blog__headers');
    }
}
