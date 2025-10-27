<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pago;

class PagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Pago::create([
        'codigo' => '001',
        'cliente' => 'Ana López',
        'producto' => 'Tarjeta de Debito',
        'tipo' => 'Ahorro',
        'fecha_pago' => '2025-12-25',
        'monto_minimo' => 2800,
        'monto_maximo' => 3600,
    ]);
     Pago::create([
        'codigo' => '002',
        'cliente' => 'Jose Luis',
        'producto' => 'Tarjeta de Debito',
        'tipo' => 'Ahorro',
        'fecha_pago' => '2025-12-25',
        'monto_minimo' => 2800,
        'monto_maximo' => 3600,
    ]);

    
    }
}
