<?php

namespace Database\Seeders;

use App\Models\Agent;
use App\Models\Merchant;
use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $merchant1 = Merchant::factory()->create();
        $merchant2 = Merchant::factory()->create();
        $merchant3 = Merchant::factory()->create();

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
            'merchant_id' => $merchant1->id
        ]);

        Agent::factory(3)->create([
            'store_id' => $store2->id,
            'merchant_id' => $merchant2->id
        ]);

        Agent::factory(3)->create([
            'store_id' => $store3->id,
            'merchant_id' => $merchant3->id
        ]);
    }
}
