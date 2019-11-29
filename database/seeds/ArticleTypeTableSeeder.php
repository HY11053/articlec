<?php

use Illuminate\Database\Seeder;

class ArticleTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('article_types')->insert([
            'content_type' =>'加盟费用',
            'created_at' =>\Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now(),
        ]);
    }
}
