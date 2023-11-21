<?php

namespace Tests\Unit;
use Tests\TestCase;
use App\Models\Cart;
use App\Models\Product;
/** use PHPUnit\Framework\TestCase; */

class CartTest extends TestCase
{
    public static $cart;
    /**
     * A basic unit test example.
     */
    public static function InitializeCart(){
        self::$cart = new Cart;
        self::$cart->add(Product::first());
        self::$cart->add(Product::first());
        self::$cart->add(Product::where('id', 2)->first() );
        self::$cart->add(Product::first());
        self::$cart->add(Product::where('id', 2)->first() );
        self::$cart->add(Product::where('id', 3)->first() );
    }

    public function testConstructor(): void
    {
        $carrito = new Cart;
        $this->assertEquals(0, $carrito->dTotalPrice);
        $this->assertEquals(0, $carrito->iTotalItems);
        $this->assertEquals([], $carrito->htItem);
    }

    public function testAdd(): void
    {
        self::InitializeCart();
        $this->assertEquals(2, self::$cart->htItem[2]['cantidad']);
        $this->assertEquals(6, self::$cart->iTotalItems);

        self::$cart->add( Product::first() );
        $this->assertEquals(4, self::$cart->htItem[1]['cantidad']);
        $this->assertEquals(7, self::$cart->iTotalItems);

        self::$cart->add( Product::where('id', 3)->first() );
        $this->assertEquals(2, self::$cart->htItem[3]['cantidad']);
        $this->assertEquals(8, self::$cart->iTotalItems);
        $this->assertEquals(241.58, self::$cart->dTotalPrice);
    }

    public function testRemove(): void
    {
        self::InitializeCart();
        self::$cart->remove( Product::first() );
        $this->assertEquals(2, self::$cart->htItem[1]['cantidad']);
        $this->assertEquals(5, self::$cart->iTotalItems);

        self::$cart->remove( Product::where('id', 3)->first() );
        $this->assertEquals(0, self::$cart->htItem[3]['cantidad']);
        $this->assertEquals(4, self::$cart->iTotalItems);
        $this->assertEquals(170.46, self::$cart->dTotalPrice);
    }
    public function testRemoveAll(): void
    {
        self::$cart->removeAll( Product::where('id', 3)->first() );
        self::$cart->removeAll( Product::first() );
        $this->assertEquals(2, self::$cart->iTotalItems);
        $this->assertEquals(146.46, self::$cart->dTotalPrice);
        $this->assertFalse(array_key_exists(Product::first()->id, self::$cart->htItem));
    }
}
