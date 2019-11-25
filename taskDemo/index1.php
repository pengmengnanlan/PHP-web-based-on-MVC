<?php
spl_autoload_register(function($class){
    $sources = array("./controllers/$class.php","./models/$class.php");
    foreach($sources as $source){
        if(file_exists($source)){
            include_once($source);
        }
    }
});

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
        $taskId=$qsArray[2];
        $controller->{$method}($taskId);
    }else{
        $controller->{$method}();
    }
}else{
    $myController=new TaskControllerJSON();
    $myController->getTasks();
}
?>
