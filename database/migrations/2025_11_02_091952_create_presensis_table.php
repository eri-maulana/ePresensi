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
        Schema::create('presensis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('jadwal_id')->nullable()->constrained('jadwals')->onDelete('set null');
            $table->foreignId('kampus_id')->nullable()->constrained('kampuses')->onDelete('set null');
            $table->enum('type', ['masuk', 'pulang'])->default('masuk');
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->unsignedInteger('distance_m')->nullable();
            $table->string('foto_selfie', 255)->nullable();
            $table->enum('status', ['pending', 'valid', 'rejected'])->default('pending');
            $table->timestamps();

            $table->index(['user_id']);
            $table->index(['jadwal_id']);
            $table->index(['kampus_id']);
            $table->index(['status']);
            $table->index(['jadwal_id', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensis');
    }
};
