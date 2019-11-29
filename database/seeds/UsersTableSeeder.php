<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => '梁李良',
            'email' => 'liang569874@163.com',
            'password' => bcrypt('Linux3306'),
            'created_at' =>\Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now(),
        ]);
    }
}
