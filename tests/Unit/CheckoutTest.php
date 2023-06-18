<?php

namespace Tests\Unit;

use App\Services\CheckoutService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Config;


class CheckoutTest extends TestCase
{
    use RefreshDatabase;

    public function setUp():void {
        parent::setUp();
        Artisan::call('db:seed');
    }

    /**
     * Examples  scan Data:
     * FRI,SRI,FRI,FRI,CF1
     *
    */

    /**
     * A basic unit test example.
     *
     * @return void
     */

    public  function test_checkout(){

        $pricing_rules = Config::get('pricerules.price_rules');
        $checkoutService = new CheckoutService($pricing_rules);
        $checkoutService->scan('FR1');
        $checkoutService->scan('SR1');
        $checkoutService->scan('FR1');
        $checkoutService->scan('FR1');
        $checkoutService->scan('CF1');

        $this->assertEquals(11.61,$checkoutService->total);
    }
    /**
     * Examples  scan Data:
     * FRI,FRI
     *
    */

    public  function test_checkout1(){
        $pricing_rules = Config::get('pricerules.price_rules');

        $checkoutService = new CheckoutService($pricing_rules);
        $checkoutService->scan('FR1');
        $checkoutService->scan('FR1');

       $this->assertEquals(3.11,$checkoutService->total);
    }
    /**
     * Examples  scan Data:
     * SR1,SR1,FRI,SR1
     *
    */
    public  function test_checkout2(){
        $pricing_rules = Config::get('pricerules.price_rules');
        $checkoutService = new CheckoutService($pricing_rules);
        $checkoutService->scan('SR1');
        $checkoutService->scan('SR1');
        $checkoutService->scan('FR1');
        $checkoutService->scan('SR1');

       $this->assertEquals(9.11,$checkoutService->total);
    }
    // public function test_example()
    // {
    //     $this->assertTrue(true);
    // }
}
