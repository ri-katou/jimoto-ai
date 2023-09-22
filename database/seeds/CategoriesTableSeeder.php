<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            1 => ['ラーメン屋', 'そば・うどん屋', 'レストラン・食堂', 'カフェ', '特産物', '居酒屋'],
            2 => ['ラーメン', 'そば・うどん', 'パスタ・イタリアン', '中華', 'エスニック・インド', 'パン屋', 'スイーツ', '和菓子', 'カフェ', '肉', '和食'],
            3 => ['神社・寺院', '公園', '自然', '美術館・博物館', '動物園・植物園', '道の駅', 'キャンプ場'],
            4 => ['温泉', '宿泊'],
            5 => ['お祭り', '季節のイベント', 'スポーツ'],
            6 => ['お土産', '商店'],
        ];

        for ($i = 1; $i <= 6; $i++) {
            foreach ($categories[$i] as $category) {
                DB::table('categories')->insert([
                    'category_name' => $category,
                    'genre_id' => $i,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
