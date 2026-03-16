<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('live_session_attendances');
        Schema::create('live_session_attendances', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('live_session_id')
                  ->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')
                  ->constrained()->cascadeOnDelete();
            $table->timestamp('joined_at')->nullable();
            $table->unique(['live_session_id', 'user_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('live_session_attendances');
    }
};
