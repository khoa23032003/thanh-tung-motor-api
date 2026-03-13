<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('username', 50)->unique();
            $table->string('password', 255);

            $table->string('email', 100)->unique()->nullable();
            $table->string('phone', 20)->unique()->nullable();

            $table->string('full_name', 100)->nullable();
            $table->boolean('is_active')->default(true);

            $table->tinyInteger('deleted_flg')->default(0);
            $table->string('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();

            $table->string('created_by')->nullable();
            $table->timestamp('created_at')->useCurrent();

            $table->string('updated_by')->nullable();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
