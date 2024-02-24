<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shipmentMethod = ['JNE', 'JNT', 'AnterAja', 'POS', 'Gojek', 'Grab', 'Maxim', 'Kargo'];

        foreach ($shipmentMethod as $shipment) {
            DB::table('shipments')->insert([
                'name' => $shipment,
                'price' => rand(10000, 50000),
            ]);
        }
    }
}
