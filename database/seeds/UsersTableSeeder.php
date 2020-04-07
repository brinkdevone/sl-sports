<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
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
            'firstname' => 'admin',
            'name' => 'admin',
            'email' => 'admin@sl-sports.net',
            'password' => Hash::make('aaaaaaaa')
        ]);

        $author = User::create([
            'firstname' => 'author',
            'name' => 'author',
            'email' => 'author@sl-sports.net',
            'password' => Hash::make('aaaaaaaa')
        ]);

        $user = User::create([
            'firstname' => 'user',
            'name' => 'user',
            'email' => 'user@sl-sports.net',
            'password' => Hash::make('aaaaaaaa')
        ]);

        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);
    }
}
