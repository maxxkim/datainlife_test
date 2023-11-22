<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Иванов',
                'email' => 'info@datainlife.ru',
            ],
            [
                'name' => 'Петров',
                'email' => 'job@datainlife.ru',
            ],
        ]);
    }
}
