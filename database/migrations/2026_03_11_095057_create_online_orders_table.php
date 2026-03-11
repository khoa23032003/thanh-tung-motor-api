<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('online_orders', function (Blueprint $table) {

            $table->id();

            $table->string('order_code', 50)->unique();

            $table->foreignId('customer_id')
                ->constrained('customers');

            $table->foreignId('address_id')
                ->nullable()
                ->constrained('customer_addresses');

            $table->foreignId('promo_id')
                ->nullable()
                ->constrained('promotions');

            $table->decimal('subtotal', 12, 2);
            $table->decimal('shipping_fee', 12, 2)->default(0);
            $table->decimal('total_amount', 12, 2);

            $table->enum('status', [
                'Pending',
                'Processing',
                'Shipped',
                'Delivered',
                'Cancelled'
            ])->default('Pending');

            $table->tinyInteger('deleted_flg')->default(0);
            $table->string('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();

            $table->string('created_by')->nullable();
            $table->timestamp('created_at')->useCurrent();

            $table->string('updated_by')->nullable();
            $table->timestamp('updated_at')
                ->nullable()
                ->useCurrentOnUpdate();

            $table->index('customer_id');
            $table->index('address_id');
            $table->index('promo_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('online_orders');
    }
};
