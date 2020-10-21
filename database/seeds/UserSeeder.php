<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->updateOrInsert([
        	'name' => 'Admin',
        	'email' => 'admin@blog.com',
        	'password' => Hash::make('12345678'),
        	'role_id' => '1',
        	'created_at' => NULL,
        	'created_by' => '1'
        ]);
    }
}
