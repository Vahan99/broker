<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'guyqAdmin',
            'admin' => 1,
            'email' => 'guyq_admin@gmail.com',
            'password' => bcrypt('guyqAdmin2018!'),
        ]);
    }
}
