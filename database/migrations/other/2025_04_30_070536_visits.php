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
        Schema::create('__visits', function (Blueprint $table) {
            $table->id();

            $table->date('date');
            $table->string('type')->default('web');
            $table->integer('model_id')->nullable();
            $table->integer('views')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('__visits');
    }
};
