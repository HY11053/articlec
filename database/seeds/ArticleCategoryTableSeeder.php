<?php

use Illuminate\Database\Seeder;

class ArticleCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('article_categories')->insert([
            'typename' =>'干洗店加盟',
            'created_at' =>\Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now(),
        ]);
    }
}
