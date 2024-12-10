<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Module;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('module_hours', function (Blueprint $table) {
            $table->id();
            $table->foreignId(Module::class);
            $table->tinyInteger('week_day')->comment('0 is sunday, keep going until saturday..');
            $table->time('hour_start');
            $table->time('hour_end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module_hours');
    }
};