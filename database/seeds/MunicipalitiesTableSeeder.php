<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MunicipalitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $municipalities = [
            1 => ['沼田', '片品', '川場', '昭和', 'みなかみ',],
            2 => ['中之条', '長野原', '嬬恋', '草津', '高山', '東吾妻',],
            3 => ['前橋', '渋川', '榛東', '吉岡', '伊勢崎', '玉村',],
            4 => ['高崎', '安中', '藤岡', '上野村', '神流', '富岡', '下仁田', '南牧', '甘楽',],
            5 => ['太田', '桐生', 'みどり', '館林', '板倉', '明和', '千代田', '大泉', '邑楽'],
        ];

        for ($i = 1; $i <= 5; $i++) {
            foreach ($municipalities[$i] as $municipalitie) {
                DB::table('municipalities')->insert([
                    'municipalities_name' => $municipalitie,
                    'area_id' => $i,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
