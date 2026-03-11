<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('repair_labor', function (Blueprint $table) {

            $table->id();

            $table->foreignId('repair_order_id')
                ->constrained('repair_orders')
                ->cascadeOnDelete();

            $table->foreignId('service_id')
                ->constrained('services');

            $table->foreignId('mechanic_id')
                ->constrained('mechanics');

            $table->decimal('labor_fee', 12, 2);

            $table->tinyInteger('deleted_flg')->default(0);
            $table->string('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();

            $table->string('created_by')->nullable();
            $table->timestamp('created_at')->useCurrent();

            $table->string('updated_by')->nullable();
            $table->timestamp('updated_at')
                ->nullable()
                ->useCurrentOnUpdate();

            $table->index('repair_order_id');
            $table->index('service_id');
            $table->index('mechanic_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('repair_labor');
    }
};
