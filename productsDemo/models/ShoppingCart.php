<?php
class ShoppingCart{
    private $cart;
    // private $getNumberOfPro;

    public function __construct(){
        $this->cart=array();
    }

    public function addToCart($product){
        if(!array_key_exists($product->id, $this->cart)){
            $product->qty++;
            $this->cart[$product->id]=$product;
        }else{
            $p=$this->cart[$product->id];
            $p->qty++;
            $this->cart[$p->id]=$p;
        }
    }

    public function removeFromCart($product){
        if(array_key_exists($product->id, $this->cart)){
            $p=$this->cart[$product->id];
            $p->qty--;
            if($p->qty>0){
                $this->cart[$p->id]=$p;
            }else{
                unset($this->cart[$product->id]);
            }
        }
    }

    public function emptyCart(){
        if(isset($this->cart)){
            $this->cart=array();
        }
    }

    public function getProductsInCart(){
        $arrayObject=new ArrayObject($this->cart);
        return $arrayObject->getArrayCopy();
    }

    public function getTotalToPay(){
        $totalToPay=0;
        foreach($this->cart as $prodInCart){
            $totalToPay+=$prodInCart->qty * $prodInCart->price;
        }
        return $totalToPay;
    }

    public function getNumberOfPro(){
        $numOfProd=0;
        foreach($this->cart as $prodInCart){
            $numOfProd+=$prodInCart->qty;
        }
        return $numOfProd; 
    }
}
?>