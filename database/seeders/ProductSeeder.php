<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->upsert([
            ['id' => 1, 'image' => 'coal-3.webp',     'name' => 'Уголь древесный 10 кг', 'slug' => 'charcoal',       'price' => 8800, ],
            ['id' => 2, 'image' => 'wood-1.webp',     'name' => 'Дрова берёзовые',       'slug' => 'birch-firewood', 'price' => 4990],
            ['id' => 3, 'image' => 'coal-4.webp',     'name' => 'Уголь орех',            'slug' => 'coal-nut',       'price' => 8800],
            ['id' => 4, 'image' => 'wood-2-500.webp', 'name' => 'Круглый лес, сосна',    'slug' => 'pine',           'price' => 4990],
        ], ['id']);
    }
}
