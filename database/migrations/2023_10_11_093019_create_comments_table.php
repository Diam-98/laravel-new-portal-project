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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->string('name', 255);
            $table->string('email');
            $table->string('web_site')->nullable();
            $table->boolean('isActive')->default(true);

            $table->unsignedBigInteger('article_id');
            $table->foreign('article_id')->references('id')
                ->on('articles')->onDelete('CASCADE');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
