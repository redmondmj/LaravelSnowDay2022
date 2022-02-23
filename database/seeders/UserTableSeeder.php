<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'school' => 'NSCC',
            'password' => Hash::make('password')
        ]);

        DB::table('users')->insert([
            'name' => Str::random(10),
            'school' => Str::random(4),
            'email' => Str::random(6).'@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
