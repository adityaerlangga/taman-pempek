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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_detail_code');
            $table->string('transaction_code');
            $table->string('transaction_detail_product_code');
            $table->integer('transaction_detail_price');
            $table->integer('transaction_detail_quantity');
            $table->integer('transaction_detail_total_price');
            $table->boolean('transaction_detail_is_deleted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_details');
    }
};