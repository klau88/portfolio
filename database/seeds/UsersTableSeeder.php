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
            'name' => config('auth.default.user'),
            'email' => config('auth.default.email'),
            'password' => bcrypt(config('auth.default.password')),
        ]);
    }
}
