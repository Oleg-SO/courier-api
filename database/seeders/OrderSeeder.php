<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run()
    {
        Order::create([
            'weight' => 2.5,
            'region' => 1,
            'delivery_hours' => json_encode(['10:00-14:00', '15:00-18:00']),
        ]);
    }
}
