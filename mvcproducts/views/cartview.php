<?php
include_once('./views/header.php');
// var_dump($productsInCart);
?>
<div class="container">
    <table>
    <?php
        $ShoppingCartController = new ShoppingCartController();
        if(isset($productsInCart) && count($productsInCart)>0){ 
            echo '<h1>Your shoppingcart</h1>';
            echo '<a href="./index1.php?ShoppingCartController/emptyCart">Empty cart <i class="fa fa-trash"></i></a>';
            echo '<table class="table table-striped">';
            echo '<tr><td>Name</td><td>Qty</td><td>Price</td><td>Sum</td><td>Remove</td><td>Add</td></tr>';
            foreach($productsInCart as $prod){
                if($prod->qty>0){
                    $pay=$prod->price * $prod->qty;
                    echo '<tr>';
                    echo "<td>$prod->name</td>";
                    echo "<td>$prod->qty</td>";
                    echo "<td>$prod->price <i class='fa fa-rmb'></td>";
                    echo "<td>$pay <i class='fa fa-rmb'></td>";
                    echo "<td><a href='./index1.php?ShoppingCartController/removeFromCart/$prod->id'><i class='fa fa-minus'></i></td>";
                    echo "<td><a href='./index1.php?ShoppingCartController/addToCart/$prod->id'><i class='fa fa-plus'></i></td>";
                    // echo "<td><a href='#' onclick='.$ShoppingCartController->addToCart($prod->id).'></td>";
                    echo '</tr>';
                }
            }
            echo "<tr><td colspan=6 style='background-color:green; color:white'>Total To Pay : $totalToPay</td></tr>";

        }else{
            echo '<h2>Your Cart is empty</h2>';
        }

    ?>
    </table>
    <a href="<?=$_SERVER['PHP_SELF']?>?ShoppingCartController/showProductsForSale">Show products for shopping <i class='fa fa-cart-plus'></i>
</div>

</body>
</html>