<?php
session_start();
class ShoppingCartController{
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
        $this->view->assign('productsForSale',$this->model->getProductsForSale());
        $this->view->assign('numberOfProducts', $this->shoppingCart->getNumberOfPro());
        $this->view->display('./views/productsforsaleview.php');
    }

    public function showCart(){
        $this->getSessionArray();
        $this->view->assign('productsInCart',$this->shoppingCart->getProductsInCart());
        $this->view->assign('totalToPay',$this->shoppingCart->getTotalToPay());
        $this->view->display('./views/cartview.php');
    }

    public function addToCart($id){
        $this->getSessionArray();
        $product=NULL;
        $product=$this->model->getProductById($id);
        $this->shoppingCart->addToCart($product);
        // show cart content, cart view
        $this->showProductsForSale();
    }

    public function removeFromCart($id){
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
        $this->view->display('./views/cartview.php');
    }
}
?>