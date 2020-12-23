<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LecturersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lecturers')->delete();
        DB::table('lecturers')->insert([
            'user_id' => 2,
        ]);
        DB::table('lecturers')->insert([
            'user_id' => 3,
        ]);
        DB::table('lecturers')->insert([
            'user_id' => 4,
        ]);
        DB::table('lecturers')->insert([
            'user_id' => 5,
        ]);
        DB::table('lecturers')->insert([
            'user_id' => 6,
        ]);
    }
}
