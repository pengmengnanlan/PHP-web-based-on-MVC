<?php
class ViewHelper{
    // an array to set all the data that a view needs 
    private $viewData;

    public function __construct(){
        $this->viewData=array();
    }

    public function assign($key, $value){
        $this->viewData[$key]=$value;
    }

    public function display($view){
        // extract() 函数从数组中将变量导入到当前的符号表
        extract($this->viewData);
        // turn the data in array into the variables that can be used in the view
        // key value as the variable name
        include($view);
    }
}
?>