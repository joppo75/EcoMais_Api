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
        Schema::create('gas_carbonico_emitidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_combustivels')->constrained('combustivels');
            $table->decimal('qtd_listros', 10, 2);
            $table->decimal('qtd_km', 10, 2);
            $table->string('resultado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gas_carbonico_emitidos');
    }
};
