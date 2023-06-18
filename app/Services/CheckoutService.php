<?php

namespace App\Services;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Log;

class CheckoutService
{
    private $price_rules;
    public $total = 0;
    /**
     * constructor
     */
    public function __construct($price_rules){
        $this->price_rules =  $price_rules;
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function scan(String $item)
    {
        $product =  Product::where('product_code',$item)->first();
        if($product){
            Cart::create(['product_id'=>$product->id]);
            $this->total = $this->getTotal();
        }
    }
    public function getTotal(){
        $cart_products = Cart::query()
        ->join('products','carts.product_id','=','products.id')
        ->selectRaw('products.product_code,products.price,sum(coalesce(carts.qty,1)) as quantity')
        ->groupByRaw('products.product_code,products.price')
        ->get();
        $total = 0;
        foreach ($cart_products as $product) {
            $rule = $this->price_rules[$product->product_code] ?? NULL;
            if(!is_null($rule)){
                $total +=  $this->{$rule[0]}($product,$rule[1],$rule[2]);
            }
            else{
                $total += $product->price * $product->quantity;
            }
            Log::info('Product Code: '.$product->product_code.' Product Quantity : '.$product->quantity.' Product Price :'.$product->price);
        }
        return $total;
    }

    public function buy_one_get_free($product,$rule1,$rule2){
        $quantity = floor($product->quantity / 2) + $product->quantity % 2;
        $total  = $quantity * $product->price;
        return $total;
    }

    public function bulk_discount($product,$rule1,$rule2){
        $price = $product->price;
        if($product->quantity>=$rule1){
            $price = $rule2;
        }
        $total   = $product->quantity * $price;
        return $total;
    }
}

?>
