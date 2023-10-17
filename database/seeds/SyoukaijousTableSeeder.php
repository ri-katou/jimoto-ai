<?php

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SyoukaijousTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('syoukaijous')->insert([
            'user_id' => 1,
            'image1' => 'testtesttest',
            'title' => 'テスト',
            'spotname' => 'テストスポット',
            'address' => 'テストアドレス',
            'url' => 'テストURL',
            'body' => '本文のテスト',
            'municipalities_id' => 2,
            'category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
