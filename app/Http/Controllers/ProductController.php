<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Services\CheckoutService;
use Config;
class ProductController extends Controller
{
    //
    public function index()
    {
        $products =  Product::all();
        $pricing_rules = Config::get('pricerules.price_rules');
        $total_price = (new CheckoutService($pricing_rules))->getTotal();
        return view('product',compact(['products','total_price']));
    }
    public function scan($product_code){
        $product =  Product::where('product_code',$product_code);
        $pricing_rules = Config::get('pricerules.price_rules');
        $checkoutService = new CheckoutService($pricing_rules);
        if($product){
            $checkoutService->scan($product_code);
        }
        return redirect()->route('product');
    }
}
