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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date');
            $table->float('price');
            $table->unsignedBigInteger('train_id');
            $table->unsignedBigInteger('ticket_type_id');
            $table->foreign('train_id')->references('id')->on('trains');
            $table->foreign('ticket_type_id')->references('id')->on('ticket_types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};