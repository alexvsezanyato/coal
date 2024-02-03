<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $table = DB::table('menu');

        $table->insert(['name' => 'Регистрация', 'link' => '/register', 'position' => 'main-right']);
        $table->insert(['name' => 'Вход', 'link' => '/login', 'position' => 'main-right']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table = DB::table('menu');

        $table->where(['link' => '/register'])->delete();
        $table->where(['link' => '/login'])->delete();
    }
};
