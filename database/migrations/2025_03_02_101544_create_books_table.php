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
            $table->text('books_name');
            $table->text('isbn');
            $table->text('status');
            $table->unsignedBigInteger('authors_id');

            $table->foreign('authors_id')->references('id')->on('authors');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
