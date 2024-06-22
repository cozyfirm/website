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
        Schema::create('__projects', function (Blueprint $table) {
            $table->id();

            $table->string('state', 100);
            $table->string('title', 200);
            $table->string('category', 100);
            $table->string('commits', 20);
            $table->text('collaborators'); // @aladeenkapic @admirakeric @semsa ...
            $table->text('collaborators__images')->nullable();

            $table->string('link')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('__projects');
    }
};
