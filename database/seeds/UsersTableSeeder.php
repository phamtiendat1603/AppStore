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
        DB::table('users')->insert([
        	'name' => 'Phạm Tiến Đạt',
        	'email' => 'phamtiendathaui@gmail.com',
        	'password' => Hash::make('phamtiendat1603'),
        	'role' => 1
        ]);
    }
}
