<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
        'username' =>'aravindan',
        'password' =>Hash::make('sparkout'),
        'name' =>'aravindan',
        'email' =>'aravindan@mailinator.com',
        'phone' =>'9876543210',
        'team_id' => 1,
        'role_id' => 1 ,
        'is_verified' => 1,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    }
}
