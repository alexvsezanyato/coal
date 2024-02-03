<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->upsert([
            ['id' => 1, 'active' => 1, 'image' => '', 'name' => 'Уголь',    'slug' => 'coal'],
            ['id' => 2, 'active' => 1, 'image' => '', 'name' => 'Дрова',    'slug' => 'firewood'],
            ['id' => 3, 'active' => 1, 'image' => '', 'name' => 'Перегной', 'slug' => 'humus'],
            ['id' => 4, 'active' => 1, 'image' => '', 'name' => 'Зерновые', 'slug' => 'cereals'],
            ['id' => 5, 'active' => 1, 'image' => '', 'name' => 'Грибы',    'slug' => 'mushrooms'],
            ['id' => 6, 'active' => 1, 'image' => '', 'name' => 'Бобовые',  'slug' => 'legumes'],
            ['id' => 7, 'active' => 1, 'image' => '', 'name' => 'Семена',   'slug' => 'seeds'],
        ], ['id']);
    }
}
