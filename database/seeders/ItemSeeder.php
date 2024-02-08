<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 50; $i++) {
            DB::table('items')->insert([
                'name' => 'Item ' . $i,
                'user_id' => rand(1, 10), // Adjust the range based on your seller IDs
                'image' => 'path/to/your/image' . $i . '.jpg', // Adjust the path based on your image path
                'description' => 'Description for Item ' . $i,
                'price' => rand(10000, 100000), // Adjust the range based on your price range
                'stock' => rand(1, 50), // Adjust the range based on your stock range
                'shipment' => 'Shipment method for Item ' . $i,
            ]);
        }
    }
}
