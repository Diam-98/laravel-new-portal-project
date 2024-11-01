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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();

            $table->string('title', 255)->unique();
            $table->string('slug', 1000);
            $table->string('image')->nullable();
            $table->text('description');
            $table->boolean('isComment')->default(true);
            $table->boolean('isActive')->default(true);
            $table->boolean('isSharable')->default(true);

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')
                ->on('categories')->onDelete('CASCADE');

            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')
                ->on('users')->onDelete('CASCADE');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
