<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->string('sub_id', 10)->primary();
            $table->string('sub_name');
            $table->text('sub_description');
            $table->string('sub_credit');
            $table->string('sub_lecture');
            $table->string('sub_lab');
            $table->string('sub_homework');
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
