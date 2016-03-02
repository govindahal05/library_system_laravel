<?php
class ProductsController extends BaseController {
	// public function __construct(Product $product) {
	// 	$this->product = $product;
	// }
	public function showProducts() {
		$products = Product::all();
		// dd($products);
		return View::make('index')->with("allProducts", $products);
	}
	public function addToCart() {
		$product_id = \Input::get('product_id');
		$product_name = \Input::get('product_name');
		$quantity = \Input::get('quantity');
		$price = \Input::get('price');
		// $password = \Input::get('password');
		// dd($price);
		$total = $quantity * $price;
		// dd($total);
		Cart::create([
			'userid' => '2',
			'productid' => $product_id,
			'price' => $price,
			'quantity' => $quantity,
			'total' => $total,
			'status' => 'Unpaid',
		]);
		Session::flash('message', "Product Added to Cart");
		return Redirect::back();
	}
	public function myCart() {
		$carts = Cart::all();
		// dd($products);
		// dd($carts);
		return View::make('cart')->with("allCarts", $carts);
	}
}
?>