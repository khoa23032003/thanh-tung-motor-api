<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('repair_orders', function (Blueprint $table) {

            $table->id();

            $table->foreignId('vehicle_id')
                ->constrained('vehicles');

            $table->foreignId('appointment_id')
                ->nullable()
                ->constrained('appointments');

            $table->enum('status', [
                'Báo giá',
                'Đang sửa',
                'Chờ thanh toán',
                'Hoàn thành'
            ])->default('Báo giá');

            $table->decimal('total_parts', 12, 2)->default(0);
            $table->decimal('total_labor', 12, 2)->default(0);
            $table->decimal('final_amount', 12, 2);

            $table->tinyInteger('deleted_flg')->default(0);
            $table->string('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();

            $table->string('created_by')->nullable();
            $table->timestamp('created_at')->useCurrent();

            $table->string('updated_by')->nullable();
            $table->timestamp('updated_at')
                ->nullable()
                ->useCurrentOnUpdate();

            $table->index('vehicle_id');
            $table->index('appointment_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('repair_orders');
    }
};
