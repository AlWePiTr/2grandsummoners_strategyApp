<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\support\Facades\DB;


class postTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'content' => 'null',
            'posting_time' => '2020-1-1 0:0:0'
        ];
        DB::table('post')->insert($param);
    }
}
