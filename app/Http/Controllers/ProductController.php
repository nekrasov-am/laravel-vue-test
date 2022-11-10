<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
	{
		$products = Product::with('variants')->get();
		return response(json_encode($products));
	}

	public function buy(Request $request)
	{
		$cart = $request->get('cart');
		foreach ($cart as $id) {
			$variant = ProductVariant::find($id);
			$variant->quantity--;
			$variant->save();
		}
	}
}
