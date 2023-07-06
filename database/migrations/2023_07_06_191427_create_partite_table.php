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
        Schema::create('partite', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('IdPartita');
            $table->string('Squadra1');
            $table->string('Squadra2');
            $table->string('Casa');
            $table->string('Ospite');
            $table->string('Competizione');
            $table->string('Stadio');
            $table->string('Orario');
            $table->string('DataPartita');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partite');
    }
};
