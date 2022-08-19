<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->integer('qty');
            $table->decimal('base_price', 16, 2)->default(0);
            $table->decimal('base_total', 16, 2)->default(0);
            $table->decimal('tax_amount', 16, 2)->default(0);
            $table->decimal('tax_percent', 16, 2)->default(0);
            $table->decimal('discount_amount', 16, 2)->default(0);
            $table->decimal('discount_percent', 16, 2)->default(0);
            $table->decimal('sub_total', 16, 2)->default(0);;
            $table->string('name');
            $table->string('weight');

            $table->foreignId('order_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->nullable()->constrained()->cascadeOnUpdate();
            $table->index('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
};
