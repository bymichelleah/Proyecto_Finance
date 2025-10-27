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
        Schema::create('pagos', function (Blueprint $table) {
             $table->id();
        $table->string('codigo');
        $table->string('cliente');
        $table->string('producto');
        $table->string('tipo');
        $table->date('fecha_pago');
        $table->decimal('monto_minimo', 10, 2);
        $table->decimal('monto_maximo', 10, 2);
        $table->string('documento_pdf')->nullable(); // Ruta del comprobante de pago
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
