<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $date = mktime(22,50,30,10,8,2020);
        DB::table('users')->insert([
            'id' => 1,
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'user_type' => 3, //admin
            'created_at' => date("Y-m-d H:i:s", $date)
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'username' => 'teacher1',
            'email' => 'teacher1@email.com',
            'password' => bcrypt('12345678'),
            'full_name' => 'Phạm Văn Hường',
            'user_type' => 2, // lecture
            'created_at' => date("Y-m-d H:i:s", $date)
        ]);
        DB::table('users')->insert([
            'id' => 3,
            'username' => 'teacher2',
            'email' => 'teacher2@email.com',
            'password' => bcrypt('12345678'),
            'full_name' => 'Lê Bá Cường',
            'user_type' => 2, // lecture
            'created_at' => date("Y-m-d H:i:s", $date)
        ]);
        DB::table('users')->insert([
            'id' => 4,
            'username' => 'teacher3',
            'email' => 'teacher3@email.com',
            'password' => bcrypt('12345678'),
            'full_name' => 'Lê Thị Hồng Vân',
            'user_type' => 2, // lecture
            'created_at' => date("Y-m-d H:i:s", $date)
        ]);
        DB::table('users')->insert([
            'id' => 5,
            'username' => 'teacher4',
            'email' => 'teacher4@email.com',
            'password' => bcrypt('12345678'),
            'full_name' => 'Thái Thị Thanh Vân',
            'user_type' => 2, // lecture
            'created_at' => date("Y-m-d H:i:s", $date)
        ]);
        DB::table('users')->insert([
            'id' => 6,
            'username' => 'teacher5',
            'email' => 'teacher5@email.com',
            'password' => bcrypt('12345678'),
            'full_name' => 'Lê Đức Thuận',
            'user_type' => 2, // lecture
            'created_at' => date("Y-m-d H:i:s", $date)
        ]);
        DB::table('users')->insert([
            'id' => 7,
            'username' => 'student',
            'email' => 'student@gmail.com',
            'password' => bcrypt('12345678'),
            'user_type' => 1, //student
            'created_at' => date("Y-m-d H:i:s", $date)
        ]);
    }
}
