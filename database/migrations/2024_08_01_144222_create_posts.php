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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->text('content')->nullable();
            $table->unsignedBigInteger('id_category'); // Khai báo cột id_category
            $table->unsignedBigInteger('views')->default(0);
            $table->enum('show',['an','hien'])->default('hien');
            $table->string('tags')->nullable();
            $table->string('lang')->nullable();
            $table->tinyInteger('noiBat')->default(0);
            $table->foreign('id_category')->references('id')->on('categories')->onDelete('cascade');
            // $table->foreignId('id_category')->constrained('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tin');
    }
};