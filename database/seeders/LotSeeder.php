<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LotSeeder extends Seeder
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
                'title' => 'KLARISSA MORENO|149 EAST BELTWAY SOUTH|ABILENE|TX|79602|298-64-5637|4|24|1990',
                'price' => 0.3
            ],
            [
                'title' => 'MEGAN RANEY|706 FUFF STREET|SWEETWATER|TX|79556|298-76-7672|9|18|1990',
                'price' => 0.3
            ],
        ];

        DB::table('lots')->insert($data);
    }
}
