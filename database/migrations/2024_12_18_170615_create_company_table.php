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
        Schema::create('company', function (Blueprint $table) {
            $table->id('company_id')->primary();
            $table->unsignedBigInteger('position_id');
            $table->string('user_id', 10);
            $table->string('company_name');
            $table->double('company_latitude')->nullable();
            $table->double('company_longitude')->nullable();
            $table->string('business_information');
            $table->string('company_type');
            $table->integer('salary')->nullable();
            $table->string('period');
            $table->string('skill_suggestion')->nullable();
            $table->timestamps();
            
            $table->foreign('position_id')
                ->references('position_id')
                ->on('positions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company');
    }
};
