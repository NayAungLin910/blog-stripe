<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // monthly plan
        Plan::create([
            'name' => 'Monthly Plan',
            'slug' => 'monthly-plan',
            'stripe_name' => 'monthly',
            'stripe_product_id' => 'prod_O9CU6CrrzVTvUm',
            'stripe_price_id' => 'price_1NMu5IGaELn9C10kkmcHEPZM', // the api id of the price of the product
            'price' => 2,
            'abbreviation' => '/month',
        ]);

        // yearly plan
        Plan::create([
            'name' => 'Yearly Plan',
            'slug' => 'yearly-plan',
            'stripe_name' => 'yearly',
            'stripe_product_id' => 'prod_O9CV1eTWHqTPZM',
            'stripe_price_id' => 'price_1NMu6VGaELn9C10kLsRAZXK2',
            'price' => 20,
            'abbreviation' => '/yearly',
        ]);
    }
}
