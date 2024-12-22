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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id('cerf_id')->primary();
            $table->string('cerf_name');
            $table->string('cerf_img_url');
            $table->string('cerf_type');
            $table->string('issued_by');
            $table->date('issue_date');
            $table->date('expiration_date')->nullable();
            $table->text('cerf_description');
            $table->string('user_id', 10);

            // Adding the foreign key constraint
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
