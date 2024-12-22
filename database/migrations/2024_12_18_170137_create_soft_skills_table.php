<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('soft_skills', function (Blueprint $table) {
            $table->id('skill_id')->primary();
            $table->string('skill_name');
            $table->string('skill_img_url');
            $table->string('skill_type');
            $table->date('skill_date');
            $table->string('skill_description');
            $table->string('user_id', 10);

            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade'); 
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('soft_skills');
    }
};
