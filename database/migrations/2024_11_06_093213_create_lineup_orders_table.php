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
        Schema::create('lineup_orders', function (Blueprint $table) {
            $table->id();
            $table->string('position'); //守備位置
            $table->foreignId('player_id')->constrained('players'); //playersテーブルから選手を参照する
            $table->unsignedInteger('order'); //打順
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lineup_orders');
    }
};
