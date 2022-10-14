<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->insert([
            [
                'id' => 1,
                'category_id' => 1,
                'title' => 'Buy dog food',
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'category_id' => 2,
                'title' => 'Go for walk',
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
