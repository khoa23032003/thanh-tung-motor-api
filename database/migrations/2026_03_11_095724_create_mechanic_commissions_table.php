<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mechanic_commissions', function (Blueprint $table) {

            $table->id();

            $table->foreignId('mechanic_id')
                ->constrained('mechanics');

            $table->foreignId('repair_labor_id')
                ->constrained('repair_labor');

            $table->decimal('amount', 12, 2);

            $table->date('earned_date');

            $table->enum('status', [
                'Unpaid',
                'Paid'
            ])->default('Unpaid');

            $table->tinyInteger('deleted_flg')->default(0);
            $table->string('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();

            $table->string('created_by')->nullable();
            $table->timestamp('created_at')->useCurrent();

            $table->string('updated_by')->nullable();
            $table->timestamp('updated_at')
                ->nullable()
                ->useCurrentOnUpdate();

            $table->index('mechanic_id');
            $table->index('repair_labor_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mechanic_commissions');
    }
};
