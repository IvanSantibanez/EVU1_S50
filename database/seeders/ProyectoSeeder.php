<?php

namespace Database\Seeders;

use App\Models\Proyecto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Proyecto::create([
            'nombre' => 'Proyecto de Desarrollo Web',
            'fechaInicio' => '2025-01-01',
            'estado' => 'En curso',
            'responsable' => 'Alejandro García',
            'monto' => 2500000,
            'created_by' => 1,
        ]);

        Proyecto::create([
            'nombre' => 'Sistema de Gestión de Inventario',
            'fechaInicio' => '2025-03-15',
            'estado' => 'Pendiente',
            'responsable' => 'Pedro Pérez',
            'monto' => 1200000,
            'created_by' => 2,
        ]);
    }
}
