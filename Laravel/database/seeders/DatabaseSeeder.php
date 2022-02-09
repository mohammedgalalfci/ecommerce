<?php

namespace Database\Seeders;

use App\Models\Favorite;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CartSeeder::class,
            CategorySeeder::class,
            CustomerSeeder::class,
            FavoriteSeeder::class,
            OrderSeeder::class,
            ProductSeeder::class,
            SubcategorySeeder::class,
            RatingSeeder::class,
            StoreSeeder::class,
        ]);
    }
}
