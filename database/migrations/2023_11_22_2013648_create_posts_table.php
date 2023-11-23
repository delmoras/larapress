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
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('content');
            $table->text('keywords')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->string('featured_image')->nullable();
            $table->boolean('is_deleted')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->integer('views')->default(0);
            $table->integer('likes')->default(0);
            $table->integer('dislikes')->default(0);
            $table->integer('sort')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
