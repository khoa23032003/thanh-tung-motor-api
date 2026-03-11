<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();

            $table->timestamp('logged_at', 6)->useCurrent();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('ip_address', 45)->nullable();
            $table->string('event_type', 50)->nullable();
            $table->string('resource_type', 50)->nullable();

            $table->unsignedBigInteger('resource_id')->nullable();

            $table->tinyInteger('status')->nullable();
            $table->json('details')->nullable();

            $table->string('session_id', 128)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
    }
};
