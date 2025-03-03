<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('readers', function (Blueprint $table) {
            $table->id();
            $table->text('last_name');
            $table->text('first_name');
            $table->text('middle_name');
            $table->date('date_of_birth');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('readers');
    }
};
