<?php
    include_once('./views/header.php');
?>
    <div class="container">
        <h1>In Edit View</h1>
        <a href="<?=$_SERVER['PHP_SELF']?>?ProductController/showAddView"><i class="fa fa-plus"></i> Add new product</a><br><br>
        <form action="<?=$_SERVER['PHP_SELF']?>?ProductController/updateProduct" method="POST">
            Id: <input type="text" name="id" readonly value="<?=$product->id?>" class="form-control"><br><br>
            Name: <input type="text" name="name" value="<?=$product->name?>" class="form-control"><br><br>
            Category: <input type="text" name="category" value="<?=$product->category?>" class="form-control"><br><br>
            Description: <textarea name="description" class="form-control"><?=$product->description?></textarea><br><br>
            Image: <input type="text" name="img" value="<?=$product->img?>" class="form-control"><br><br>
            Price: <input type="text" name="price" value="<?=$product->price?>" class="form-control"><br><br>
            <button type='submit' class='btn btn-primary'><i class='fa fa-save'></i> Save</button><br><br>
        </form>
        <a href="<?=$_SERVER['PHP_SELF']?>?ProductController/getProducts"><i class='fa fa-home'></i> To Products</a>  
    </div>  
    </body>
</html>