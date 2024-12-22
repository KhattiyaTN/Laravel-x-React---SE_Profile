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
        Schema::create('subject_selections', function (Blueprint $table) {
            $table->id('select_sub_id');  
            $table->string('term', 2);      
            $table->string('edu_year', 4);  
            $table->string('user_id', 10);  
            $table->string('sub_id', 10);   

            $table->foreign('sub_id')
                ->references('sub_id')
                ->on('subjects')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_selection');
    }
};
