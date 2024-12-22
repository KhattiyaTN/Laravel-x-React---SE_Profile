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
        Schema::create('user_reservation', function (Blueprint $table) {
            $table->integer('user_reserve_id', 10)->primary();
            $table->string('user_id', 10);
            $table->string('user_res_topic', 255);
            $table->string('user_res_description', 255)->nullable();
            $table->dateTime('user_res_datetime_start');
            $table->dateTime('user_res_datetime_end');
            $table->timestamp('user_res_timestamp')->useCurrent()->useCurrentOnUpdate();

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
        Schema::dropIfExists('user_reservation');
    }
};
