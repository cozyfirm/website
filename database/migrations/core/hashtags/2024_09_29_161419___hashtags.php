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
        Schema::create('hashtags', function (Blueprint $table) {
            $table->id();

            $table->string('tag', 200)->nullable();;
            $table->unsignedInteger('clicks')->default(0);
            $table->unsignedInteger('views')->default(0);
            $table->string('lang', '4')->default('bs');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hashtags');
    }
};
