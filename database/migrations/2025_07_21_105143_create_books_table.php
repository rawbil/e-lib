<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            // $table->foreignId('author_id')->constrained()->onDelete('cascade');
            // $table->foreignId('category_id')->constrained()->onDelete('cascade');
            // $table->string('isbn')->unique();
            $table->text('description')->nullable();
            $table->integer('total_copies')->default(1);
            $table->integer('available_copies')->default(1);
            $table->year('published_year');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};