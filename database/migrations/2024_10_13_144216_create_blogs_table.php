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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_category_id')->nullable();
            $table->json('titles')->nullable();
            $table->json('short_descriptions')->nullable();
            $table->json('descriptions')->nullable();
            $table->string('slug')->nullable();
            $table->json('gallery_images')->nullable();
            $table->integer('sort')->default(0)->nullable();
            $table->tinyInteger('status')->default(1)->nullable();
            $table->tinyInteger('published_status')->default(1)->nullable();
            $table->date('published_date')->nullable();
            $table->json('meta_titles')->nullable();
            $table->json('meta_descriptions')->nullable();
            $table->string('meta_image')->nullable();
            $table->json('related_articles')->nullable();
            $table->dateTime('created_date')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
