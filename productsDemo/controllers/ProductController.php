<?php
class ProductController{
    private $model;
    private $view;
    public function __construct(){
        $this->model=new ProductModel();
        $this->view=new ViewHelper();
    }

    public function getProducts(){
        // echo json_encode($this->model->getProducts());
        // $this->view->assign("products",$this->model->getProducts());
        // $this->view->assign("categories",$this->model->getAllCategory());
        echo json_encode($this->model->getProducts());
        echo json_encode($this->model->getAllCategory());
        // $this->view->display("./views/productsview.php");
    }

    public function getProductById($id){
        // $this->view->assign("product",$this->model->getProductById($id));
        echo json_encode($this->model->getProductById($id));
        // $this->view->display("./views/productByIdview.php");
    }

    public function showEditView($id){
        echo json_encode($this->model->getProductById($id));
        // $this->view->assign("product",$this->model->getProductById($id));
        $this->view->display("./views/editView.php");
    }

    public function updateProduct(){
        $product=$this->getProductFromForm();
        $this->model->updateProduct($product);
        echo json_encode(array("response"=>"Updated product".$_POST['id']));
        // header("Location: {$_SERVER['PHP_SELF']}");
    }

    public function deleteProductById($id){
        $this->model->deleteProductById($id);
        echo json_encode(array("response"=>"Deleted product".$_POST['id']));
        // header("Location: {$_SERVER['PHP_SELF']}");
    }

    public function showAddView(){
        $this->view->display("./views/addView.php");
    }

    public function addProduct(){
        $product=$this->getProductFromForm();
        $this->model->addProduct($product);
        echo json_encode(array("response"=>"Added product".$_POST['name']));
        // header("Location: {$_SERVER['PHP_SELF']}");
    }

    public function getProductFromForm(){
        $product=new stdClass();
        $product->id=strip_tags(trim($_POST['id']));
        $product->name=strip_tags(trim($_POST['name']));
        $product->img=strip_tags(trim($_POST['img']));
        $product->category=strip_tags(trim($_POST['category']));
        $product->price=strip_tags(trim($_POST['price']));
        $product->description=strip_tags(trim($_POST['description']));

        return $product;
    }

    // public function getProductsByCategory(){
    //     $category=strip_tags(trim($_POST['category']));
    //     $this->view->assign("categories",$this->model->getAllCategory());
    //     $this->view->assign("products",$this->model->getProductsByCategory($category));
    //     $this->view->display("./views/productsview.php");
    // }

    public function getProductsByCategory($category){
        $this->view->assign("categories",$this->model->getAllCategory());
        $this->view->assign("products",$this->model->getProductsByCategory($category));
        $this->view->display("./views/productsview.php");
    }
}
?>
