<?php

use Illuminate\Database\Seeder;

class TitleCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('title_categories')->insert([
            'type' =>'费用类标题',
            'created_at' =>\Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now(),
        ]);
    }
}
