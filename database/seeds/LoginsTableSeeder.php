<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoginsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('logins')->insert([
            'name' => 'Andreas Asatera',
            'email' => 'andreas.asatera@gmail.com',
            'password' => bcrypt('Andre1995'),
        ]);
    }
}
