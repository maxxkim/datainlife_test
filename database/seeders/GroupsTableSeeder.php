<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('groups')->insert([
            [
                'name' => 'Группа1',
                'expire_hours' => 1,
            ],
            [
                'name' => 'Группа2',
                'expire_hours' => 2,
            ],
        ]);
    }

}
