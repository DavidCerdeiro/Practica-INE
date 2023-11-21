<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Cart extends Model
{
    public $iTotalItems = 0;
    public $htItem = [];
    public $dTotalPrice = 0;
    public function __Construct(Cart $cart=null){
        if( $cart != null){
            $this->iTotalItems = $cart->iTotalItems;
            $this->dTotalPrice = $cart->dTotalPrice;
            $this->htItem = $cart->htItem;
        }
    }

    public function add(Product $product){
        if(array_key_exists($product->id, $this->htItem)){
            $this->htItem[$product->id]['cantidad']+=1;
        }else{
            $this->htItem[$product->id]=array(
                'id' => $product->id, 'nombre' => $product->name, 'imgUrl' => $product->imgUrl, 
 'precio' => $product->price, 'cantidad' => 1
            );
        }
        $this->iTotalItems += 1;
        $this->dTotalPrice += $product->price;
    }

    public function remove(Product $product){
        if(array_key_exists($product->id, $this->htItem)){
            if($this->htItem[$product->id]['cantidad']>0){
                $this->htItem[$product->id]['cantidad']-=1;
                $this->iTotalItems -= 1;
                $this->dTotalPrice -= $product->price;
            }
        }
    }
    public function removeAll(Product $product){
        if(array_key_exists($product->id, $this->htItem)){
            $this->iTotalItems -= $this->htItem[$product->id]['cantidad'];
            $this->dTotalPrice -= $product->price * $this->htItem[$product->id]['cantidad'];
            unset($this->htItem[$product->id]);
        }
    }
}   

?>