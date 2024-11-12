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
        Schema::table('lineup_orders', function (Blueprint $table) {
            $table->dropForeign('lineup_orders_player_id_foreign');
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lineup_orders', function (Blueprint $table) {
            $table->dropForeign(['lineup_orders_player_id_foreign']);
            $table->foreign('player_id')->references('id')->on('players')->onDelete('restrict');
        });
    }
};
