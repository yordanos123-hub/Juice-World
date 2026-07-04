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
        Schema::create('branch_juice', function (Blueprint $table) {
            $table->id();
            // ከ branches ቴብል ጋር ያገናኘዋል
            $table->foreignId('branch_id')->constrained()->cascadeOnDelete();
            // ከ juices ቴብል ጋር ያገናኘዋል
            $table->foreignId('juice_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch_juice');
    }
};
