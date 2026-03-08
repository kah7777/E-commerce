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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('vendor');
            $table->bigInteger('price');
            $table->char('currency', 3);
            $table->string('category');
            $table->integer('quantity');
            // $table->boolean('multi_components'); //will implelemt the idea of product components sooner
            // $table->foreignId('parents_id')->constrained('products')->cascadeOnDelete();
            $table->foreignIdFor('Store', 'store_id')->constrained('stores')->cascadeOnDelete();
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
