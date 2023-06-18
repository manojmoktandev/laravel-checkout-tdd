<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $products = [
                [
                    'product_code'=>'CF1',
                    'name'=>'Coffee',
                    'price'=>1.89,
                    'description'=>'Price Matched',
                    'image'=>''
                ],
                [
                    'product_code'=>'FR1',
                    'name'=>'Fruit Tea',
                    'price'=>3.11,
                    'description'=>'Buy One get one Free',
                    'image'=>''
                ],
                [
                    'product_code'=>'SR1',
                    'name'=>'Strawberry',
                    'price'=>3.50,
                    'description'=>'Price drop while bought more than 3',
                    'image'=>''
                ]
            ];
       DB::table('products')->insert($products);

    }
}
