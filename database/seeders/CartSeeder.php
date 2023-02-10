<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Cart::query()->insert([
            [
                'product_id'=>2,
                'user_id'=>2,
                'quantity'=>1,
                'subtotal'=>45000
            ],
            [
                'product_id'=>1,
                'user_id'=>2,
                'quantity'=>1,
                'subtotal'=>45000
            ],
            [
                'product_id'=>1,
                'user_id'=>3,
                'quantity'=>1,
                'subtotal'=>45000
            ]
        ]);
    }
}
