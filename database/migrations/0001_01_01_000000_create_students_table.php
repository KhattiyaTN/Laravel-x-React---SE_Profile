<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('user_id', 10)->primary();
            $table->string('title');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('nickname');
            $table->date('birthday');
            $table->string('generation');
            $table->string('github')->nullable();
            $table->string('status');
            $table->string('image')->nullable();
            $table->string('original_school');
            $table->double('gpax')->nullable();
            $table->string('address')->nullable();
            $table->string('tel', 10);
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('emergency_tel', 10);
            $table->string('relationship');
            $table->string('congenital_disease')->nullable();
            $table->string('allergic_thing')->nullable();
            $table->string('health_coverage')->nullable();
            $table->string('health_coverage_place')->nullable();
            $table->string('military_status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
