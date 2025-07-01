<?php

namespace Database\Seeders;

use App\Models\Taskuser;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaskUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('taskusers')->delete();


        $TaskUsers = [[
            'user_id' => '1',
            'nama' => 'Evan',
            'office' => 'CARE',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'user_id' => '1',
            'nama' => 'Prasetya',
            'office' => 'TPIS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'user_id' => '1',
            'nama' => 'Tsani',
            'office' => 'TPIS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'user_id' => '1',
            'nama' => 'Rofiq',
            'office' => 'TPIS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'user_id' => '1',
            'nama' => 'Farko',
            'office' => 'TPIS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'user_id' => '1',
            'nama' => 'Rini',
            'office' => 'TPIS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'user_id' => '1',
            'nama' => 'Gahral',
            'office' => 'TPIS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'user_id' => '1',
            'nama' => 'Ichand',
            'office' => 'TPIS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'user_id' => '1',
            'nama' => 'Solihin',
            'office' => 'TPIS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'user_id' => '1',
            'nama' => 'Ryan',
            'office' => 'TPIS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'user_id' => '1',
            'nama' => 'Erik',
            'office' => 'TPIS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'user_id' => '1',
            'nama' => 'Soleh',
            'office' => 'TPIS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'user_id' => '1',
            'nama' => 'Wardi',
            'office' => 'TPIS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'user_id' => '1',
            'nama' => 'Nindy',
            'office' => 'TPIS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'user_id' => '1',
            'nama' => 'Asri',
            'office' => 'TPIS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'user_id' => '1',
            'nama' => 'Herdian',
            'office' => 'TPIS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'user_id' => '1',
            'nama' => 'Mesa',
            'office' => 'TPIS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'user_id' => '1',
            'nama' => 'Iin',
            'office' => 'TPIS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'user_id' => '1',
            'nama' => 'Dita',
            'office' => 'TPIS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'user_id' => '1',
            'nama' => 'Yoso',
            'office' => 'TPIS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'user_id' => '1',
            'nama' => 'Haryo',
            'office' => 'TPIS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'user_id' => '1',
            'nama' => 'Arya',
            'office' => 'TPIS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'user_id' => '1',
            'nama' => 'Liza',
            'office' => 'TPIS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'user_id' => '1',
            'nama' => 'Visca',
            'office' => 'TPIS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]];

        Taskuser::insert($TaskUsers);
    }
}
