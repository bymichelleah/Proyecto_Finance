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
        Schema::create('clientes', function (Blueprint $table) {
            // Campos de Identificación Personal
            $table->id();
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('n_documento', 20)->unique()->comment('N° Documento');
            $table->string('telefono', 20)->nullable();
            $table->string('correo_electronico', 100)->unique();
            $table->string('ocupacion', 100)->nullable();

            // Campos de Ubicación
            $table->string('provincia', 50)->comment('Provincia');
            $table->string('distrito', 50)->comment('Distrito');
            $table->string('direccion', 255)->comment('Dirección');
            
            // Relación y Estado
            // Asumiendo que 'Producto Adquirido' se relaciona con la tabla 'productos'
            // Podrías usar product_id como clave foránea
            $table->foreignId('producto_adquirido_id')->nullable()->constrained('productos'); 
            
            // El campo 'Estado' puede ser para el cliente en sí (activo/inactivo)
            $table->enum('estado', ['Activado', 'Inactivo', 'Pendiente'])->default('Activado');

            // Campo de fecha de creación del registro
            // La columna 'Fecha de creación' de la imagen ya está cubierta por 'timestamps()'
            $table->timestamps(); // Esto crea las columnas 'created_at' y 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};