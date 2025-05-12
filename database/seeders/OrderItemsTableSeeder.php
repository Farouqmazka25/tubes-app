<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        DB::table('order_items')->insert([
            ['order_id' => 1, 'product_id' => 1, 'quantity' => 1, 'price' => 150000],
            ['order_id' => 1, 'product_id' => 2, 'quantity' => 2, 'price' => 175000],
            ['order_id' => 2, 'product_id' => 3, 'quantity' => 1, 'price' => 200000],
        ]);
    }
}
