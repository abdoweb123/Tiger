<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // php artisan migrate --path=Modules\Product\Database\Migrations\2024_05_08_140855_add_gallery_id_to_product_item_table.php
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->foreign('coupon_id')->nullable()->on('coupons')->references('id')->onUpdate('cascade')->onDelete('cascade');
            // $table->decimal('total_after_coupon', 9, 3)->nullable()->default(0);
            $table->decimal('sub_total_after_coupon', 9, 3)->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            
        });
    }
};
