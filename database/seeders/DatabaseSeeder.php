<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::query()->create([
            "name" => "tegar pratama",
            "umur" => 21,
            "no_telephone" => "085275048404",
            "email" => "tegarp00@gmail.com",
            "alamat" => "cisitu",
            "role" => 2,
            "password" => "whoami1234",
            "email_verified_at" => now(),
            "remember_token" => Str::random(10),
        ]);
    }
}