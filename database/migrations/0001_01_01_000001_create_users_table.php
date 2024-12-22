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
        // ตารางข้อมูลบัญชี
        Schema::create('accounts', function (Blueprint $table) {
            $table->id('account_id');
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('role', ['teacher', 'student'])->default('student');
            $table->string('user_id', 10)->nullable(); 
            $table->foreign('user_id') 
                ->references('user_id')
                ->on('users')
                ->onDelete('set null');

            $table->rememberToken();
            $table->timestamps();
        });

        // ตารางสำหรับการรีเซ็ตรหัสผ่าน
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // ตาราง sessions สำหรับติดตามผู้ใช้
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('account_id')  
                ->nullable()
                ->constrained('accounts', 'account_id')  
                ->onDelete('cascade');
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
        
        
    }

    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('accounts');
    }
};
