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
        function generateRandomText($minLength = 1000) {
            // Daftar huruf acak
            $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

            $randomText = "";

            // Mengulang sebanyak minimum panjang yang diinginkan
            while (strlen($randomText) < $minLength) {
                // Memilih huruf acak dari daftar
                $randomCharacter = $characters[rand(0, strlen($characters) - 1)];

                // Menambahkan huruf ke teks acak
                $randomText .= $randomCharacter;
            }

            return $randomText;
        }
        for ($i = 1; $i <= 50; $i++) {
            DB::table('items')->insert([
                'name' => 'Item ' . $i,
                'slug'=> 'Item-'.$i,
                'user_id' => rand(1, 10), // Adjust the range based on your seller IDs
                'image' => 'uploads/bright-jupiter-cute-planet-pixel-art-style-space-background-glossy-200548647.jpg', // Adjust the path based on your image path
                'description' => generateRandomText(1000) . $i,
                'price' => rand(10000, 100000), // Adjust the range based on your price range
                'stock' => rand(1, 50), // Adjust the range based on your stock range
                // 'shipment' => rand(1, 3),
            ]);
        }
    }
}
