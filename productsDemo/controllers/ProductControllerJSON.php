<?php
class ProductControllerJSON{
	private $model;
    private $view;
    public function __construct()    {
		$this->model=new ProductModel();
       
    }
    public function getProducts(){
        //encode as json data.
        echo json_encode($this->model->getProducts()); 
    }

    public function getProductById($id){
        echo json_encode($this->model->getProductById($id));
    }    

    public function updateProduct(){       
        
        //create stdClass and set it's properties
        $product=new stdClass();
        $product->id=$_POST['id'];
        $product->name=$_POST['name'];
        $product->description=$_POST['description'];
        $product->category=$_POST['category'];
        $product->img=$_POST['image'];
        $product->price=$_POST['price'];

        $this->model->updateProduct($product);
        
        echo json_encode(array("response"=>"Updated product ".$_POST['id']));
    }

    public function addProduct(){
        
        $product=new stdClass();
        //create stdClass and set it's properties
        // $product=new stdClass();
        /*$product->id=$_POST['id'];*/
        $product->name=$_POST['name'];
        $product->description=$_POST['description'];
        $product->category=$_POST['category'];
        $product->img=$_POST['image'];
        $product->price=$_POST['price'];

        $this->model->addProduct($product);
        
        echo json_encode(array("response"=>"Added product ".$_POST['name']));
    }    
    
    public function deleteProductById($id){
        $this->model->deleteProductById($id);	
        echo json_encode(array("response"=>"Deleted product ".$id));
    }

    public function getAllCategories(){
        echo json_encode($this->model->getAllCategory());
    }

    public function getProductsByCategory($category){
        echo json_encode($this->model->getProductsByCategory($category));
    }
    
}

?>