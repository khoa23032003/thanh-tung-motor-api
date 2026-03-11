<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {

            $table->id();

            $table->foreignId('online_order_id')
                ->nullable()
                ->constrained('online_orders');

            $table->foreignId('repair_order_id')
                ->nullable()
                ->constrained('repair_orders');

            $table->enum('payment_method', [
                'Cash',
                'Bank Transfer',
                'Momo',
                'VNPay'
            ]);

            $table->decimal('amount', 12, 2);

            $table->string('transaction_code', 100)->nullable();

            $table->timestamp('payment_date')
                ->useCurrent();

            $table->tinyInteger('deleted_flg')->default(0);
            $table->string('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();

            $table->string('created_by')->nullable();
            $table->timestamp('created_at')->useCurrent();

            $table->string('updated_by')->nullable();
            $table->timestamp('updated_at')
                ->nullable()
                ->useCurrentOnUpdate();

            $table->index('online_order_id');
            $table->index('repair_order_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
