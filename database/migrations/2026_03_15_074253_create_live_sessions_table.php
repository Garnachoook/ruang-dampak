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
        Schema::dropIfExists('live_sessions');
        Schema::create('live_sessions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('batch_id')
                  ->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->unsignedInteger('week_number')->default(1);
            $table->unsignedInteger('session_number')->default(1);
            $table->dateTime('scheduled_at');
            $table->unsignedInteger('duration_min')->default(90);
            $table->string('meeting_url')->nullable();
            $table->string('recording_url')->nullable();
            $table->enum('status', [
                'scheduled','ongoing','done','cancelled'
            ])->default('scheduled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('live_sessions');
    }
};
