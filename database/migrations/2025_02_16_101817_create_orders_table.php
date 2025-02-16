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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('catalog_id')->constrained('catalog')->onDelete('cascade'); // Relasi ke catalog            $table->date('start_date');
            $table->date('end_date');
            $table->integer('duration');
            $table->bigInteger('total_price');
            $table->enum('status', ['pending', 'Accepted', 'canceled', 'processing', 'completed', 'decline'])->default('pending');  
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
