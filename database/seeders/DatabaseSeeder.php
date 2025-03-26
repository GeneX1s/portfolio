<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Balance;
use App\Models\RYR\ryrClasses;
use App\Models\RYR\ryrMembers;
use App\Models\RYR\ryrTeachers;
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

        // Balance::create([
        //     'nama' => 'Cash',
        //     'saldo' => 1000000,
        //     'tipe' => 'Cash',
        // ]);

        Balance::create([
            'nama' => 'BCA',
            'saldo' => 1000000,
            'tipe' => 'Bank',
        ]);

        Balance::create([
            'nama' => 'Investasi1',
            'saldo' => 1000000,
            'tipe' => 'Investment',
            'dividen' => 0.1,
            'penerima_dividen' => 1,
            'tipe' => 'Investment',
        ]);

        // Balance::create([
        //     'nama' => 'RYR',
        //     'saldo' => 0,
        //     'tipe' => 'Lainnya',
        // ]);

        ryrTeachers::create([
            'nama' => 'Okta',
            'salary' => '5000000',
            'join_date' => now(),
            'dob' => '1990-01-01',
            'jenis_kelamin' => 'Male',
            'deskripsi' => 'A dedicated teacher with 10 years of experience.',
            'status' => 'Active',
        ]);

        ryrTeachers::create([
            'nama' => 'Rian',
            'salary' => '0',
            'join_date' => now(),
            'dob' => '1976-04-22',
            'jenis_kelamin' => 'Female',
            'deskripsi' => 'A dedicated teacher with 10 years of experience.',
            'status' => 'Active',
        ]);

        ryrClasses::create([
            'id' => 'OKTA_060225',
            'nama_kelas' => 'Ashtanga Yoga',
            'tipe' => 'public', // public, private
            'teacher' => 'Okta',
            'schedule' => '6PM',
            'biaya' => 200000,
            'day' => 'Kamis',
            'description' => 'A beginner level yoga class focusing on basic postures and breathing techniques.',
        ]);

        ryrClasses::create([
            'id' => 'OKTA_060226',
            'nama_kelas' => 'Yoga for Intermediate',
            'tipe' => 'public', // public, private
            'teacher' => 'Okta',
            'schedule' => '6PM',
            'biaya' => 200000,
            'day' => 'Jumat',
            'description' => 'An intermediate level yoga class focusing on more advanced postures and breathing techniques.',
        ]);

        ryrMembers::create([
            'nama_murid' => 'Jane Doe',
            'tipe' => 'Regular',
            'join_date' => now(),
            'total_attendance' => 0,
            'dob' => '1995-05-15',
            'jenis_kelamin' => 'Female',
            'deskripsi' => 'A dedicated member of the yoga class.',
        ]);

        ryrMembers::create([
            'nama_murid' => 'Alice Smith',
            'tipe' => 'Regular',
            'join_date' => now(),
            'total_attendance' => 0,
            'dob' => '1990-10-10',
            'jenis_kelamin' => 'Female',
            'deskripsi' => 'A dedicated member of the yoga class.',
        ]);

        ryrMembers::create([
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
