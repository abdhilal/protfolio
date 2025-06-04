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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();;
            $table->text('description')->nullable();;
            $table->text('overview')->nullable();
            $table->text('problem_solved')->nullable();
            $table->text('my_Role')->nullable();
            $table->text('image_cover')->nullable();
            $table->text('link_video')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
