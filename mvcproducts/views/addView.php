<?php
    include_once('./views/header.php');
?>
    <div class="container">
        <h1>In Add View</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>?ProductController/addProduct" method="POST">
            Name: <input type="text" name="name" class="form-control"><br><br>
            Category: <input type="text" name="category" class="form-control"><br><br>
            Description: <textarea name="description" class="form-control"></textarea><br><br>
            Image: <input type="text" name="img" class="form-control"><br><br>
            Price: <input type="text" name="price" class="form-control"><br><br>
            <button type='submit' class='btn btn-primary'><i class='fa fa-save'></i> Save</button><br><br>
        </form>
        <a href="<?=$_SERVER['PHP_SELF']?>?ProductController/getProducts"><i class='fa fa-home'></i> To Products</a>  
    </div> 
    </body>
</html>