<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {

            $table->id();

            $table->foreignId('category_id')
                ->nullable()
                ->constrained('categories');

            $table->foreignId('brand_id')
                ->nullable()
                ->constrained('brands');

            $table->string('sku', 50)->unique();
            $table->string('name', 255);
            $table->string('slug', 255)->unique();

            $table->text('description')->nullable();

            $table->decimal('price', 12, 2);
            $table->decimal('cost_price', 12, 2)->nullable();

            $table->integer('stock_qty')->default(0);
            $table->integer('warranty_months')->default(0);

            $table->boolean('is_active')->default(true);

            $table->tinyInteger('deleted_flg')->default(0);
            $table->string('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();

            $table->string('created_by')->nullable();
            $table->timestamp('created_at')->useCurrent();

            $table->string('updated_by')->nullable();
            $table->timestamp('updated_at')
                ->nullable()
                ->useCurrentOnUpdate();

            $table->index('category_id');
            $table->index('brand_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
