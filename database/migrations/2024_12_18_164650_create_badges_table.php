<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBadgesTable extends Migration
{
    public function up(): void
    {
        Schema::create('badges', function (Blueprint $table) {
            $table->id('badge_id')->primary();
            $table->string('badge_name');
            $table->string('badge_type');
            $table->string('badge_img_url');
            $table->text('badge_description');
            $table->string('badge_date_awarded');
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
        Schema::dropIfExists('badges');
    }
}
