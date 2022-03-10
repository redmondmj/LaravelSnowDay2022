<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $authorRole = Role::where('name', 'author')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'school' => 'NSCC',
            'password' => Hash::make('password')
        ]);

        $author = User::create([
            'name' => 'Author User',
            'email' => 'author@author.com',
            'school' => 'NSCC',
            'password' => Hash::make('password')
        ]);
        $user = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'school' => 'NSCC',
            'password' => Hash::make('password')
        ]);

        $matt = User::create([
            'name' => 'Matt',
            'email' => 'matt@user.com',
            'school' => 'NSCC',
            'password' => Hash::make('password')
        ]);

        DB::table('users')->insert([
            'name' => Str::random(10),
            'school' => Str::random(4),
            'email' => Str::random(6).'@gmail.com',
            'password' => Hash::make('password'),
        ]);


        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);
        $matt->roles()->attach($userRole);
    }
}
