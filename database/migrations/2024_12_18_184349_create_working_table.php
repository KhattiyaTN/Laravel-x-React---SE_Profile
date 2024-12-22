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
        Schema::create('working', function (Blueprint $table) {
            $table->increments('working_id');
            $table->string('company_name', 255);
            $table->string('company_latitude', 255);
            $table->string('company_longitude', 255);
            $table->enum('internship_require', ['รับฝึกงาน', 'ไม่รับฝึกงาน']);
            $table->year('working_year_start');
            $table->year('working_year_end');
            $table->string('working_salary_rate', 255);
            $table->string('working_img', 255);
            $table->string('user_id', 10);
            $table->unsignedBigInteger('position_id');

            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');

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
        Schema::dropIfExists('working');
    }
};
