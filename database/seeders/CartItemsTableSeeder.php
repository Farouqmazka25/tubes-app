<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CartItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        DB::table('cart_items')->insert([
            ['cart_id' => 1, 'product_id' => 1, 'quantity' => 1],
            ['cart_id' => 1, 'product_id' => 2, 'quantity' => 2],
            ['cart_id' => 2, 'product_id' => 3, 'quantity' => 1],
        ]);
    }
}
