<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Initialize Faker
        $faker = Faker::create();

        // Define how many transactions to generate
        $transactionsCount = 50;  // You can adjust this number to your needs

        // Insert fake transactions into the database
        foreach (range(1, $transactionsCount) as $index) {
            Transaction::create([
                'nama'            => $faker->name,
                'nominal'         => $faker->randomFloat(2, 1000, 10000), // random number between 1000 and 10000
                'kategori'        => $faker->randomElement(['Pendapatan','Pengeluaran']),,
                'sub_kategori'    => $faker->word,
                'deskripsi'       => $faker->sentence,
                'status'          => $faker->randomElement(['Active', 'Pending', 'Deleted']), // Example status
                'profile'         => $faker->randomElement(['super-admin', 'admin', 'ryr']),
                'balance'         => $faker->word,
                'balance_destination' => $faker->randomFloat(2, 0, 100000),
                'created_at'      => Carbon::now()->subDays(rand(1, 30)),  // Random date in the last 30 days
                'updated_at'      => Carbon::now()->subDays(rand(1, 30)),  // Random date in the last 30 days
            ]);
        }
    }
}
