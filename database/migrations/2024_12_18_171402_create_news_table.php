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
        Schema::create('news', function (Blueprint $table) {
            $table->id('news_id')->primary();
            $table->string('user_id', 10);
            $table->string('news_name', 255);
            $table->string('news_type', 255);
            $table->string('news_from', 255)->nullable();
            $table->dateTime('news_date_start');
            $table->dateTime('news_date_end');
            $table->string('news_img', 255)->nullable();
            $table->string('news_detail', 255)->nullable();
            $table->string('news_url', 255)->nullable();

            $table->timestamps();

            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
