<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('excerpt');
            $table->longText('content');
            $table->string('category');
            $table->string('author');
            $table->string('image')->nullable();
            $table->unsignedInteger('views')->default(0);
            $table->json('tags')->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            
            // Index untuk performa
            $table->index(['is_published', 'published_at']);
            $table->index('category');
        });
    }

    public function down()
    {
        Schema::dropIfExists('news');
    }
};