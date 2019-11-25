<?php
session_start();
class ShoppingCartControllerJSON{
    private $model;
    private $productModel;
    private $view;
    private $shoppingCart;
    public function __construct(){
        $this->model=new Model();
        $this->view=new ViewHelper();
        $this->shoppingCart=new shoppingCart();
    }

    public function getSessionArray(){
        if(!array_key_exists('cart',$_SESSION)){
            $this->shoppingCart=new ShoppingCart();
            // add the updated cart to the session
            $_SESSION['cart']=$this->shoppingCart;
        }else{
            $this->shoppingCart=$_SESSION['cart'];
        }
    }

    public function showProductsForSale(){
        $this->getSessionArray();
        echo json_encode($this->model->getProductsForSale());
    }

    public function getNumberOfPro(){
        $this->getSessionArray();
        echo json_encode($this->shoppingCart->getNumberOfPro());
    }

    public function showCart(){
        $this->getSessionArray();
        echo json_encode($this->shoppingCart->getProductsInCart());
    }

    public function getTotalToPay() {
        $this->getSessionArray();
        echo json_encode($this->shoppingCart->getTotalToPay());
    }

    public function addToCart($id){
        $this->getSessionArray();
        $product=NULL;
        $product=$this->model->getProductById($id);
        $this->shoppingCart->addToCart($product);
        $this->getNumberOfPro();
    }

    public function add($id){
        $this->getSessionArray();
        $product=NULL;
        $product=$this->model->getProductById($id);
        $this->shoppingCart->addToCart($product);
        $this->showCart();
    }

    public function remove($id){
        $this->getSessionArray();
        $product=NULL;
        $product=$this->model->getProductById($id);
        $this->shoppingCart->removeFromCart($product);
        $this->showCart();
    }

    public function emptyCart(){
        // $this->getSessionArray();
        // $this->shoppingCart->emptyCart();
        unset($_SESSION['cart']);
        $this->showCart();
        $this->getTotalToPay();
    }
}
?>