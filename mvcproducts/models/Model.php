<?php
class Model{
    private $promodel;

    public function __construct(){
        $this->promodel=new ProductModel();
    }

    public function getProductsForSale(){
        $proDBarr=$this->promodel->getProducts();
        $productsArray=array();

        foreach($proDBarr as $prod){
            $product = new Product();
            $product->id=$prod->id;
            $product->name=$prod->name;
            $product->price=$prod->price;
            $product->qty=0;
            $productsArray[]=$product;   
        }
        return $productsArray;
    }

    public function getProductById($id){
        // get product from the database based on id
        $prodDB=$this->promodel->getProductById($id);
        // create a new product
        $product = new Product();
        $product->id=$prodDB->id;
        $product->name=$prodDB->name;
        $product->price=$prodDB->price;
        $product->qty=0;
        return $product;
    }


}
?>