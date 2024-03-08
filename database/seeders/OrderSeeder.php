<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberOfUsers = 100;
        $status = ['Not Confirmed', 'Confirmed', 'Rejected'];

        for ($i = 1; $i <= $numberOfUsers; $i++) {
            DB::table('orders')->insert([
                'item_id' => rand(1, 50),
                'user_id' => rand(1, 10),
                'receiver' => 'Receiver' . $i,
                'address' => 'addres receiver' . $i, // You may want to use Hash::make() in a real application
                'shipment_id' => rand(1, 8),
                'total_price' => rand(10000, 800000),
                'quantity' => rand(1, 3),
                'status' => 'Success',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
