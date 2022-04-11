<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuButtonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => '🏪 Магазин',
                'destination' => 'start'
            ],
            [
                'title' => '💰 Мой баланс',
                'destination' => 'start'
            ],
            [
                'title' => '📨 Обратная связь',
                'destination' => 'start'
            ],
            [
                'title' => '🛒 Мои покупки',
                'destination' => 'start'
            ],
            [
                'title' => '💡 Правила',
                'destination' => 'start'
            ],
            [
                'title' => '📝 Лоты',
                'destination' => 'shop'
            ],
            [
                'title' => '📁 Файлы',
                'destination' => 'shop'
            ],
            [
                'title' => '💸 Пополнить',
                'destination' => 'account'
            ],
        ];

        DB::table('menu_buttons')->insert($data);
    }
}
