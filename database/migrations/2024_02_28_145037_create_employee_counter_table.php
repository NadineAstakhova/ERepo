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
        Schema::create('employee_counter', function (Blueprint $table) {
            $table->id();
            $table->foreignId ('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreignId ('counter_id');
            $table->foreign('counter_id')->references('id')->on('counters')->onDelete('cascade');
            $table->integer('steps_value')->default(0);
            $table->timestamps();
            //todo add unique
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_counter');
    }
};
