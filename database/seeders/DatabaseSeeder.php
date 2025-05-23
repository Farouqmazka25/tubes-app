<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleTableSeeder;
use Database\Seeders\UserTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
        UsersTableSeeder::class,
        ProductsTableSeeder::class,
        CartsTableSeeder::class,
        CartItemsTableSeeder::class,
        OrdersTableSeeder::class,
        OrderItemsTableSeeder::class,
    ]);
    }
}
