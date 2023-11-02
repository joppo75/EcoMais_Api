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
        Schema::create('gascarbonico_emitidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_combustivels')->constrained('combustivels');
            $table->double('qtd_listros');
            $table->double('qtd_km');
            $table->string('resultado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gascarbonico_emitidos');
    }
};
