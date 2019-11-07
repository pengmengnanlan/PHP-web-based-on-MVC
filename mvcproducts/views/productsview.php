<?php
    include_once('./views/header.php');
    // var_dump($products);
?>
<div class='container'>
    <h1>In products view</h1>
    <a href="./index1.php?ProductController/showAddView/"><i class="fa fa-plus"></i> Add new product</a><br><br>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?=$_SERVER['PHP_SELF']?>?ProductController/getProducts"></i> All Products</a><br><br>
    <?php
        foreach($categories as $category){
            echo '<a class="nav-link" href="?ProductController/getProductsByCategory/'.$category->category.'">'.$category->category;
            echo '</a>';
        }
    ?>
    </nav>

    <!-- <a href="<?=$_SERVER['PHP_SELF']?>?ProductController/getProducts"><i class='fa fa-home'></i> All Products</a><br><br>
    <form action="<?=$_SERVER['PHP_SELF']?>?ProductController/getProductsByCategory" method="POST">
        <div style="float:left; padding-right:15px;"><select name='category' class="form-control">
        <option>-Select-</option>
        <?php
            foreach($categories as $category){
                echo '<option value="',$category->category,'">',$category->category;
                echo '</option>';
            }
        ?>
        </select></div>
        <div style="float:left"><button type='submit' style="float:left" class="btn btn-secondary"><i class='fa fa-hand-o-right'></i> Search</button><br><br></div>
    </form> -->


    <table class='table table-striped'>
        <tr>
            <td>Name</td>
            <td>Read More</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
        <?php
            foreach($products as $product){
                echo '<tr>';
                echo '<td>'.$product->name.'</td>';
                echo '<td><a href="./index1.php?ProductController/getProductById/',$product->id,'">Read More</a></td>';
                echo '<td><a href="./index1.php?ProductController/showEditView/',$product->id,'"><i class="fa fa-edit"></i> Edit</a></td>';
                echo '<td><a href="./index1.php?ProductController/deleteProductById/',$product->id,'"><i class="fa fa-trash"></i> Delete</a></td>';
                echo '</tr>';
            }
        ?>
    </table> 
</div>
</body>
</html>