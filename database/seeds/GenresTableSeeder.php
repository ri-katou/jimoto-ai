<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = ['地元の飲食店', '地元のグルメ', '地元の名所', '地元の温泉・宿', '地元のイベント', '地元のお店',];

        foreach ($genres as $genre) {
            DB::table('genres')->insert([
                'genre_name' => $genre,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
