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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('producto');
            $table->enum('tipo', ['cuenta_ahorros','tarjeta_debito','credito_personal','tarjeta_credito']);
            $table->decimal('tasa_interes', 5, 2)->nullable(); 
            $table->integer('plazo_meses')->nullable();
            $table->decimal('monto_minimo', 10, 2)->nullable();
            $table->decimal('monto_maximo', 10, 2)->nullable();
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
