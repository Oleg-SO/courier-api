<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Courier;

class CourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Courier::create([
            'courier_type' => 'foot',
            'regions' => json_encode([1, 2, 3]),
            'working_hours' => json_encode(['09:00-12:00', '13:00-18:00']),
        ]);

        // Убедитесь, что вы используете только существующие столбцы
        Courier::create([
            'courier_type' => 'bike',
            'regions' => json_encode([4, 5, 6]),
            'working_hours' => json_encode(['10:00-14:00', '15:00-19:00']),
        ]);

        Courier::create([
            'courier_type' => 'car',
            'regions' => json_encode([7, 8, 9]),
            'working_hours' => json_encode(['08:00-12:00', '13:00-17:00']),
        ]);
    }
}
