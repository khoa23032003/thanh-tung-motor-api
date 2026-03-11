<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('maintenance_reminders', function (Blueprint $table) {

            $table->id();

            $table->foreignId('vehicle_id')
                ->constrained('vehicles');

            $table->foreignId('repair_order_id')
                ->constrained('repair_orders');

            $table->date('reminder_date');

            $table->text('message');

            $table->boolean('is_sent')
                ->default(false);

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
            $table->index('repair_order_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('maintenance_reminders');
    }
};
