<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chores')->insert([
            [
                'name' => 'Lavar los platos',
                'description' => 'Lavar los platos después de la cena',
                'status' => 'pending',
                'assigned_to' => 1,
                'due_date' => '2025-02-15 18:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Sacar la basura',
                'description' => 'Sacar la basura de la cocina',
                'status' => 'completed',
                'assigned_to' => 2,
                'due_date' => '2025-02-14 20:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Limpiar la sala',
                'description' => 'Pasar la aspiradora y limpiar el polvo',
                'status' => 'pending',
                'assigned_to' => 3,
                'due_date' => '2025-02-16 15:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Regar las plantas',
                'description' => 'Regar las plantas del jardín',
                'status' => 'completed',
                'assigned_to' => 1,
                'due_date' => '2025-02-13 09:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Cocinar la cena',
                'description' => 'Preparar la cena para la familia',
                'status' => 'pending',
                'assigned_to' => null,
                'due_date' => '2025-02-15 19:30:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Lavar la ropa',
                'description' => 'Lavar y tender la ropa de la semana',
                'status' => 'completed',
                'assigned_to' => 2,
                'due_date' => '2025-02-12 10:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Ordenar el garaje',
                'description' => 'Reorganizar herramientas y cajas en el garaje',
                'status' => 'pending',
                'assigned_to' => null,
                'due_date' => '2025-02-20 14:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Barrer la entrada',
                'description' => 'Barrer la entrada de la casa',
                'status' => 'completed',
                'assigned_to' => 3,
                'due_date' => '2025-02-11 08:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Hacer las compras',
                'description' => 'Comprar víveres y productos esenciales',
                'status' => 'pending',
                'assigned_to' => 1,
                'due_date' => '2025-02-17 12:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Limpieza del baño',
                'description' => 'Limpiar el lavabo, inodoro y ducha',
                'status' => 'completed',
                'assigned_to' => 2,
                'due_date' => '2025-02-10 16:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
