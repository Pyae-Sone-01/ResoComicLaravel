<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name'              => 'Lara Admin',
            'email'             => 'laraadmin@laravel.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('LaraTe@m'),
            'remember_token'    => Str::random(10),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        $user->assignRole('admin');
    }
}
