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

        User::create([
            'username' => 'Finance01',
            'email' => 'finance1@gmail.com',
            'password' => bcrypt('Ryr54321!'),
            'role' => 'finance'
        ]);

        SetValue::create([
            'salary' => 1000000,
            'outcome' => 45000000,
        ]);

        // Balance::create([
        //     'nama' => 'BCA',
        //     'saldo' => 1000000,
        //     'tipe' => 'Bank',
        // ]);

        // Balance::create([
        //     'nama' => 'Investasi1',
        //     'saldo' => 1000000,
        //     'tipe' => 'Investment',
        //     'dividen' => 0.1,
        //     'penerima_dividen' => 1,
        //     'tipe' => 'Investment',
        // ]);

        Balance::create([
            'nama' => 'RYR',
            'saldo' => 0,
            'tipe' => 'Lainnya',
        ]);

        ryrTeachers::create([
            'nama' => 'Okta',
            'salary' => '5000000',
            'join_date' => now(),
            'dob' => '1990-01-01',
            'jenis_kelamin' => 'Pria',
            'instagram' => 'oktapa',
            'deskripsi' => 'Ashtanga yoga teacher.',
            'status' => 'Active',
        ]);

        ryrTeachers::create([
            'nama' => 'Rian',
            'salary' => '0',
            'join_date' => now(),
            'dob' => '1976-04-22',
            'jenis_kelamin' => 'Wanita',
            'instagram' => 'rianyogini',
            // 'instagram' => 'https://www.instagram.com/rianyogini/',
            'deskripsi' => 'Hatha and wallrope teacher.',
            'status' => 'Active',
        ]);

        ryrTeachers::create([
            'nama' => 'Agung',
            'salary' => '0',
            'join_date' => now(),
            'dob' => '',
            'jenis_kelamin' => 'Pria',
            'instagram' => 'a_putrawijaya',
            // 'instagram' => 'https://www.instagram.com/rianyogini/',
            'deskripsi' => 'Hatha yoga teacher.',
            'status' => 'Active',
        ]);

        ryrTeachers::create([
            'nama' => 'Yenkhe',
            'salary' => '0',
            'join_date' => now(),
            'dob' => '',
            'jenis_kelamin' => 'Wanita',
            'instagram' => 'yenkhe_l',
            // 'instagram' => 'https://www.instagram.com/rianyogini/',
            'deskripsi' => 'Basic yoga teacher.',
            'status' => 'Active',
        ]);

        ryrClasses::create([
            'id' => 'OKTA_060225',
            'nama_kelas' => 'Ashtanga Yoga',
            'tipe' => 'public', // public, private
            'teacher' => 'Okta',
            'start_time' => '18:30:00',
            'end_time' => '20:00:00',
            'biaya' => 75000,
            'day' => 'Kamis',
            'description' => 'A beginner level yoga class focusing on basic postures and breathing techniques.',
        ]);

        ryrClasses::create([
            'id' => 'RIAN_048292',
            'nama_kelas' => 'Wallrope Senin Pagi',
            'tipe' => 'public',
            'teacher' => 'Rian',
            'start_time' => '07:00:00',
            'end_time' => '08:30:00',
            'biaya' => 100000,
            'day' => 'Senin',
            'description' => 'Yoga class focusing on fixing postures using various props.',
        ]);

        ryrMembers::create([
            'nama_murid' => 'Yanna',
            'tipe' => 'Bulanan Special',
            'join_date' => now(),
            'total_attendance' => 0,
            'dob' => '1995-05-15',
            'jenis_kelamin' => 'Wanita',
            'deskripsi' => '',
        ]);

        ryrMembers::create([
            'nama_murid' => 'Lia',
            'tipe' => 'Bulanan Special',
            'join_date' => now(),
            'total_attendance' => 0,
            'dob' => '1990-10-10',
            'jenis_kelamin' => 'Wanita',
            'deskripsi' => '',
        ]);

        ryrMembers::create([
            'nama_murid' => 'Kristin Hung',
            'tipe' => 'Non-Member',
            'join_date' => now(),
            'total_attendance' => 0,
            'dob' => '1992-12-25',
            'jenis_kelamin' => 'Wanita',
            'deskripsi' => '',
        ]);

        ryrMembers::create([
            'nama_murid' => 'Thomas',
            'tipe' => 'Bulanan 1',
            'join_date' => now(),
            'total_attendance' => 0,
            'dob' => '1992-12-25',
            'jenis_kelamin' => 'Pria',
            'deskripsi' => 'A dedicated member of the yoga class.',
        ]);

        ryrMembers::create([
            'nama_murid' => 'Aicu',
            'tipe' => 'Non-Member',
            'join_date' => now(),
            'total_attendance' => 0,
            'dob' => '1992-12-25',
            'jenis_kelamin' => 'Wanita',
            'deskripsi' => 'A dedicated member of the yoga class.',
        ]);

        ryrMembers::create([
            'nama_murid' => 'Patricia',
            'tipe' => 'Non-Member',
            'join_date' => now(),
            'total_attendance' => 0,
            'dob' => '1992-12-25',
            'jenis_kelamin' => 'Wanita',
            'deskripsi' => 'A dedicated member of the yoga class.',
        ]);

        ryrMembers::create([
            'nama_murid' => 'Yenkhe',
            'tipe' => 'Non-Member',
            'join_date' => now(),
            'total_attendance' => 0,
            'dob' => '1992-12-25',
            'jenis_kelamin' => 'Wanita',
            'deskripsi' => 'A dedicated member of the yoga class.',
        ]);
    }
}
