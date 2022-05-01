<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 20; $i++){
            DB::table('posts')->insert([
                'title' => Str::random(10).$i,
                'content' => Str::random(500),
                'user_id'=>1,
                'created_at'=>now(),
            ]);
        }
    }
}
