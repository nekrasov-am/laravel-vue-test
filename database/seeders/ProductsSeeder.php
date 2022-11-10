<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductVariant;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Product::create([
    		'name' => 'Socks',
			'brand' => 'Vue Mastery',
			'details' => ['50% cotton', '30% wool', '20% polyester']
		]);

		ProductVariant::create([
			'product_id' => 1,
			'color' => 'green',
			'image' => './images/socks_green.jpg',
			'quantity' => 1
		]);
		ProductVariant::create([
			'product_id' => 1,
			'color' => 'blue',
			'image' => './images/socks_blue.jpg',
			'quantity' => 1
		]);
    }
}
