<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('admin'),
            'level' => 3,
            'remember_token' => Str::random(60),
            'created_at' => now()
        ]);

        DB::table('users')->insert([
            'username' => 'pengawas',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('pengawas'),
            'level' => 2,
            'remember_token' => Str::random(60),
            'created_at' => now()
        ]);

        DB::table('users')->insert([
            'username' => 'user',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('user'),
            'level' => 1,
            'remember_token' => Str::random(60),
            'created_at' => now()
        ]);
    }
}
