<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menu')->upsert([
            ['id' => 1, 'name' => 'Главная',  'position' => 'main-left',  'link' => '/'],
            ['id' => 2, 'name' => 'Каталог',  'position' => 'main-left',  'link' => '/catalog'],
            ['id' => 3, 'name' => 'Контакты', 'position' => 'main-right', 'link' => '/contacts'],
        ], ['id']);
    }
}
