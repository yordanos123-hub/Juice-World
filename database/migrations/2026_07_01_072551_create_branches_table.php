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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name');      // ለቅርንጫፍ ስም (ለምሳሌ፡ ቦሌ ቅርንጫፍ)
            $table->string('location');  // ለቅርንጫፉ አድራሻ
            $table->string('phone');     // ለስልክ ቁጥር
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
