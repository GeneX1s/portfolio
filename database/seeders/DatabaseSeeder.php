<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Balance;
use App\Models\RYR\ryr_class;
use App\Models\RYR\ryr_members;
use App\Models\RYR\ryr_teachers;
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

        User::create([
            'username' => 'RYR',
            'email' => 'roemahyogarian@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 'ryr'
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

        Balance::create([
            'nama' => 'RYR',
            'saldo' => 0,
            'tipe' => 'Lainnya',
        ]);

        ryr_teachers::create([
            'nama' => 'John Doe',
            'salary' => '5000000',
            'join_date' => now(),
            'dob' => '1990-01-01',
            'jenis_kelamin' => 'Male',
            'deskripsi' => 'A dedicated teacher with 10 years of experience.',
            'status' => 'Active',
        ]);

        ryr_class::create([
            'id' => 'OKTA_060225',
            'nama_kelas' => 'Yoga for Beginners',
            'tipe' => 'public', // public, private
            'teacher' => 'John Doe',
            'schedule' => 'Monday and Wednesday 6-7 PM',
            'biaya' => 200000,
            'description' => 'A beginner level yoga class focusing on basic postures and breathing techniques.',
        ]);

        ryr_class::create([
            'id' => 'OKTA_060226',
            'nama_kelas' => 'Yoga for Intermediate',
            'tipe' => 'public', // public, private
            'teacher' => 'John Doe',
            'schedule' => 'Tuesday and Thursday 6-7 PM',
            'biaya' => 200000,
            'description' => 'An intermediate level yoga class focusing on more advanced postures and breathing techniques.',
        ]);

        ryr_members::create([
            'nama_murid' => 'Jane Doe',
            'tipe' => 'Regular',
            'join_date' => now(),
            'total_attendance' => 0,
            'dob' => '1995-05-15',
            'jenis_kelamin' => 'Female',
            'deskripsi' => 'A dedicated member of the yoga class.',
        ]);

        ryr_members::create([
            'nama_murid' => 'Alice Smith',
            'tipe' => 'Regular',
            'join_date' => now(),
            'total_attendance' => 0,
            'dob' => '1990-10-10',
            'jenis_kelamin' => 'Female',
            'deskripsi' => 'A dedicated member of the yoga class.',
        ]);

        ryr_members::create([
            'nama_murid' => 'Bob Johnson',
            'tipe' => 'Regular',
            'join_date' => now(),
            'total_attendance' => 0,
            'dob' => '1992-12-25',
            'jenis_kelamin' => 'Male',
            'deskripsi' => 'A dedicated member of the yoga class.',
        ]);
    }
}
