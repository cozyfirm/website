<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blog__text', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('content_id')->unsigned();
            $table->foreign('content_id')
                ->references('id')
                ->on('blog__content')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->text('text');
            $table->text('text_en')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog__text');
    }
};
