<?php
spl_autoload_register(function($class){
    $sources = array("./controllers/$class.php","./models/$class.php","./views/$class.php");
    foreach($sources as $source){
        if(file_exists($source)){
            include_once($source);
        }
    }
});

// include_once('./models/ProductModel.php');
// include_once('./controllers/ProductController.php');
// include_once('./views/ViewHelper.php');

$queryString=$_SERVER["QUERY_STRING"];
// var_dump($queryString);
$qsArray=explode('/',$queryString);
// var_dump($qsArray);

// get a new controller object  
// new ProductController()
if(file_exists("./controllers/".$qsArray[0].".php")){
    $controller=new $qsArray[0]();
    $method=$qsArray[1];
    if(isset($qsArray[2])){
        $productId=$qsArray[2];
        $controller->{$method}($productId);
    }else{
        $controller->{$method}();
    }
}else{
    $myController=new ProductController();
    $myController->getProducts();
}
?>
