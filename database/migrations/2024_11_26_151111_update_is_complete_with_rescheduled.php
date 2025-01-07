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
        Schema::table('appointments', function (Blueprint $table) {
            // Update the `is_complete` column to handle 0, 1, 2, and 3 values
            $table->unsignedTinyInteger('is_complete')->default(0)->comment('0: Pending, 1: Completed, 2: Cancelled, 3: Rescheduled')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->boolean('is_complete')->default(0)->comment('0: Pending, 1: Completed')->change();
        });
    }
};
