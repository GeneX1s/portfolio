<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Balance;
use App\Models\SetValue;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 'super-admin'
        ]);

        SetValue::create([
            'salary' => 1000000,
        ]);

        Balance::create([
            'nama' => 'Cash',
            'saldo' => 1000000,
            'tipe' => 'Cash',
        ]);

        Balance::create([
            'nama' => 'BCA',
            'saldo' => 1000000,
            'tipe' => 'Bank',
        ]);

        Balance::create([
            'nama' => 'Misc',
            'saldo' => 0,
            'tipe' => 'Lainnya',
        ]);

    }
}
