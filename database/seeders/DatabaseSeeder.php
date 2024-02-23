<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\Cart;
use App\Models\User;

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
            CategorySeeder::class,
            ItemSeeder::class,
            UserSeeder::class,
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
                $users->random()->pluck('id')->toArray()
            );
        });
    }
}
