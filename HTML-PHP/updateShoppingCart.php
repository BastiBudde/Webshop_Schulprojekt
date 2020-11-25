<?php 
session_start ();

include "../includes/searchForID_Product.php";

if(isset($_POST['ProductToUpdate']) && isset($_POST['NewAmount']))
{
    $productToUpdate = intval($_POST['ProductToUpdate']);
    $newAmount = intval($_POST['NewAmount']);
    $shoppingCart = $_SESSION['ShoppingCart'];

    $indexOfProduct = searchForID_Product($productToUpdate, $shoppingCart);


    $shoppingCart[$indexOfProduct]['Menge'] = $newAmount;


    $_SESSION['ShoppingCart'] = $shoppingCart;

    header("Location: http://localhost/Webshop_Melanie_Sebastian/HTML-PHP/shoppingcart.php?UpdatedShoppingCart=True");
}
else
{
    header("Location: http://localhost/Webshop_Melanie_Sebastian/HTML-PHP/shoppingcart.php");
}
?>