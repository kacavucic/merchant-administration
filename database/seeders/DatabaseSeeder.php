<?php

namespace Database\Seeders;

use App\Models\Agent;
use App\Models\Merchant;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Merchant::truncate();
        Store::truncate();
        Agent::truncate();

        $user = User::factory()->create([
            'name' => 'Katarina',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);

        $admin = User::factory()->create([
            'name' => 'Ana',
            'email' => 'user@gmail.com',
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);

        $merchant1 = Merchant::factory()->create();
        $merchant2 = Merchant::factory()->create();
        $merchant3 = Merchant::factory()->create();

        // Merchant::factory(20)->create();

        $store1 = Store::factory()->create([
            'merchant_id' => $merchant1->id
        ]);

        $store2 = Store::factory()->create([
            'merchant_id' => $merchant2->id
        ]);

        $store3 = Store::factory()->create([
            'merchant_id' => $merchant3->id
        ]);

        Agent::factory(3)->create([
            'store_id' => $store1->id,
        ]);

        Agent::factory(3)->create([
            'store_id' => $store2->id,
        ]);

        Agent::factory(3)->create([
            'store_id' => $store3->id,
        ]);
    }
}
