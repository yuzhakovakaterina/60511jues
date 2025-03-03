<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->date('date_in');
            $table->date('date_out');
            $table->date('date_out_plan');

            $table->unsignedBigInteger('books_id');
            $table->unsignedBigInteger('readers_id');
            $table->unsignedBigInteger('users_id');

            $table->foreign('books_id')->references('id')->on('books');
            $table->foreign('readers_id')->references('id')->on('readers');
            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
