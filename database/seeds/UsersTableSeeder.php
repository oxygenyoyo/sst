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
            'name' => 'oxygenyoyo',
            'email' => 'oxygen.uo@gmail.com',
            'password' => bcrypt('gvvwxwso'),
            'role' => 'admin'
        ]);
    }
}
