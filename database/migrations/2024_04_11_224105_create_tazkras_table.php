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
        Schema::create('tazkras', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->text('message');
            $table->enum('status' , ['open' , 'closed' , 'wating']);
            $table->string('important_degree');
            $table->string('slug')->unique();
            $table->enum('type' , ['question' , 'problem' , 'add' , 'edit']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tazkras');
    }
};
