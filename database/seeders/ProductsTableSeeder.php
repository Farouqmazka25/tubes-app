<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'BonFireVanilla',
                'description' => 'Wangi vanilla dan api unggun lembut dan tahan lama.',
                'price' => 150000,
                'image' => 'parfum_vanilla.jpeg',
                'stock' => 20,
            ],
            [
                'name' => 'Parfum Citrus',
                'description' => 'Wangi segar buah citrus, cocok untuk siang hari.',
                'price' => 175000,
                'image' => 'parfum_citrus.jpeg',
                'stock' => 15,
            ],
            [
                'name' => 'Parfum Musk',
                'description' => 'Aroma maskulin dan kuat dengan sentuhan musk.',
                'price' => 200000,
                'image' => 'parfum_musk.jpeg',
                'stock' => 10,
            ],
        ]);
    }
}
