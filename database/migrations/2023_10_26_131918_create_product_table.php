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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128)->nullable(false)->unique();
            $table->string('description', 256)->nullable(false)->default('');
            $table->string('imgUrl', 512)->nullable(false);
            $table->double('price', 15, 2)->nullable(false);
            $table->integer('discountPercent')->nullable(false)->default(0);
            $table->dateTime('discountStart_at')->nullable(true);
            $table->dateTime('discountEnd_at')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
