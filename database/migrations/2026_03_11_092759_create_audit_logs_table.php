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
            $table->string('user', 255)->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->string('event_type', 50);
            $table->string('resource_type', 50);
            $table->unsignedBigInteger('resource_id')->nullable();
            $table->tinyInteger('status');
            $table->json('details')->nullable();
            $table->string('session_id', 128)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
    }
};
