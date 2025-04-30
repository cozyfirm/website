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
        Schema::create('api_system_calls', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('api_id')->unsigned();
            $table->foreign('api_id')
                ->references('id')
                ->on('api_system')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('type');

            $table->string('status')->default('error');
            $table->text('response')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_system_calls');
    }
};
