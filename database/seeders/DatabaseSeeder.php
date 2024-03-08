<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Item;
use App\Models\User;
use App\Models\Category;
use App\Models\Shipment;
use Illuminate\Database\Seeder;
use Database\Seeders\ItemSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ShipmentSeeder;
use Database\Seeders\OrderSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            // CategorySeeder::class,
            // ItemSeeder::class,
            // UserSeeder::class,
            // ShipmentSeeder::class,
            OrderSeeder::class,
        ]);

        $categories = Category::all();
        Item::all()->each(
            function ($item) use ($categories) {
                $item->categories()->attach(
                    $categories->random(rand(1, 3))->pluck('id')->toArray()
                );
            }
        );
        $users = User::all();
        Item::all()->each(function ($item) use ($users) {
            $item->users()->attach(
                $users->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
        $shipments = Shipment::all();
        Item::all()->each(function ($item) use ($shipments) {
            $item->shipments()->attach(
                $shipments->random(rand(1, 5))->pluck('id')->toArray()
            );
        });
    }
}
