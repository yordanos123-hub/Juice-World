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
        Schema::create('juices', function (Blueprint $table) {
            $table->id();
            $table->string('name');          // የጁሱ ስም (ለምሳሌ፡ አቮካዶ)
            $table->text('description');     // ስለ ጁሱ ገለጻ
            $table->decimal('price', 8, 2);  // ዋጋ (ለምሳሌ፡ 150.50)
            $table->string('image_url')->nullable(); // የጁሱ ፎቶ (ግዴታ ካልሆነ)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('juices');
    }
};
