<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('library', function (Blueprint $table) {
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('worker_id');
            $table->unsignedBigInteger('reader_id');

            $table->id();
            $table->date('date_in');
            $table->date('date_out');
            $table->date('date_out_plan');

            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('worker_id')->references('id')->on('worker');
            $table->foreign('reader_id')->references('id')->on('reader');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('library');
    }
};
