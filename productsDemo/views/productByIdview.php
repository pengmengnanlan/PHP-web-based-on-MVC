<?php 
    include_once('./views/header.php');
?>
<div class='container'>
    <a href="<?=$_SERVER['PHP_SELF']?>?ProductController/showAddView"><i class="fa fa-plus"></i> Add new product</a><br>
        <div class='card' style='width:20rem;'>
            <img class='card-img-top img-fluid' src="<?=$product->img?>">
            <div class='card-body'>
            <h4 class='card-title'><?=$product->name?></h4>
            <p><?=$product->description?></p>
            <p><?=$product->price?></p>
            <p><?=$product->category?></p>
            </div>
        </div>
    <a href="<?=$_SERVER['PHP_SELF']?>?ProductController/getProducts"><i class='fa fa-home'></i> To Products</a>  
</div>
</body>
</html>