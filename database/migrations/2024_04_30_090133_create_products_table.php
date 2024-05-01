<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->decimal('price_normal', 8, 2)->nullable();
            $table->decimal('price_gold', 8, 2)->nullable();
            $table->decimal('price_silver', 8, 2)->nullable();
            $table->string('slug')->unique()->nullable();
            $table->boolean('is_active')->nullable()->default(true);
            $table->timestamps();
        });
        DB::table('products')->insert([
            'id' => 1,
            'name' => 'Product 1',
            'description' => 'Product 1 description',
            'image' => '',
            'price_normal' => '100.00',
            'price_gold' => '200.00',
            'price_silver' => '300.00',
            'is_active' => true

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
