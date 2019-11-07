<?php
include_once('./views/header.php');
?>
<div class="container">
    <h1>Products for sale</h1>
    <span class="badge badge-primary">Total Quantities: <?=$numberOfProducts?></span><br>
    <a href="<?=$_SERVER['PHP_SELF']?>?ShoppingCartController/showCart"><i class='fa fa-opencart'></i> Go to your shoppingcart</a><br>
    <table class="table table-striped">
        <tr>
            <td>Name</td>
            <td>Price</td>
            <td>Buy it!</td>
        </tr>
        <?php
            foreach($productsForSale as $prod){
                echo '<tr>';
                echo "<td><a href='./index1.php?ProductController/getProductById/$prod->id'>$prod->name</a></td>";
                echo "<td>$prod->price <i class='fa fa-rmb'></i></td>";
                echo "<td><a href='./index1.php?ShoppingCartController/addToCart/$prod->id'><i class='fa fa-cart-plus'></i></td>";
                echo '</tr>';
            }
        ?>
    </table>
    
</div>
</body>
</html>