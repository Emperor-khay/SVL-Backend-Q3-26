<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Basket',
                'qty'=> 100,
                'price' => 5000,
                'is_top_selling' => true,
                'discount' => 10,
            ],
            [
                'name' => 'T-Shirt',
                'qty'=> 50,
                'price' => 30000,
                'is_top_selling' => false,
                'discount' => 20,
            ],
            [
                'name' => 'Bag',
                'qty'=> 50,
                'price' => 10000,
                'is_top_selling' => false,
                'discount' => null,
            ],
            [
                'name' => 'iPhone 15',
                'qty'=> 30,
                'price' => 1000,
                'is_top_selling' => true,
                'discount' => null,
            ],
            [
                'name' => 'Laptop',
                'qty'=> 1,
                'price' => 50000,
                'is_top_selling' => true,
                'discount' => 20,
            ],
        ];

        DB::transaction(function() use ($products){
            foreach($products as $product){
                Product::create($product);
            }
        });

    }
}
