<?php
namespace Modules\Authentication;

use Illuminate\Database\Seeder;
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
            'username' => 'aravindan',
            'password' => '123456',
            'name' => 'aravindan',
            'email' => 'aara@mailinator.com',
            'phone' => '8754334582',
            'team_id' => '8754334582',
            'role_id' => '8754334582',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);
    }
}
