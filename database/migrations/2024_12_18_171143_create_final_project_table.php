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
        Schema::create('final_projects', function (Blueprint $table) {
            $table->id('project_id')->primary();
            $table->string('stu_id_1', 10);
            $table->string('stu_id_2', 10)->nullable();
            $table->string('stu_id_3', 10)->nullable();
            $table->string('advisor_id', 10);
            $table->string('project_title', 255);
            $table->string('project_description', 255);
            $table->dateTime('project_start_date');
            $table->dateTime('project_end_date');
            $table->string('project_git', 255);
            $table->enum('project_status', ['ongoing', 'completed', 'on-hold']);
            $table->decimal('project_progress', 10, 0);

            $table->timestamps();

            $table->foreign('stu_id_1')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('stu_id_2')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('stu_id_3')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('advisor_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('final_project');
    }
};
