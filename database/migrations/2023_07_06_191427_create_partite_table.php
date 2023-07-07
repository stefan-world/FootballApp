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
            $table->string('idpartita');
            $table->string('squadra1');
            $table->string('squadra2');
            $table->string('casa');
            $table->string('ospite');
            $table->string('competizione');
            $table->string('stadio');
            $table->string('orario');
            $table->string('datapartita');
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
