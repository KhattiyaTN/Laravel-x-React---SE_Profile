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
        Schema::create('class_projects', function (Blueprint $table) {
            $table->id('pro_id')->primary();
            $table->string('pro_name');
            $table->string('pro_img_url');
            $table->text('pro_description');
            $table->string('pro_type');
            $table->string('pro_stack');
            $table->string('pro_git_url')->nullable();
            $table->string('sub_id', 10);
            $table->string('user_id', 10);

            $table->foreign('sub_id')
                ->references('sub_id')
                ->on('subjects')
                ->onDelete('cascade');
                
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_projects');
    }
};
