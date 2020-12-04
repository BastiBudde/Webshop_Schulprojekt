<?php 
session_start();

include "../includes/searchForID_Product.php";

if(isset($_POST['ProductToDelete']))
{
    $productToDelete = intval($_POST['ProductToDelete']);
    
    if($productToDelete == 0)
    {
        $_SESSION['ShoppingCart'] = array( array( 'ID_Produkt' => NULL, 'Menge' => NULL) );
        header("Location: http://localhost/Webshop_Melanie_Sebastian/HTML-PHP/shoppingcart.php?notice=Ihr Einkaufswagen wurde geleert");
    }
    else
    {
        $shoppingCart = $_SESSION['ShoppingCart'];

        /* Anhand der ID des zu entfernenden Produktes wird der Index im SohppingCart-Array ermittelt */
        $indexOfProduct = searchForID_Product($productToDelete, $shoppingCart);

        /* Entfernt ein das Element mit der zu entfernenden Produkt-ID */
        array_splice($shoppingCart, $indexOfProduct, 1);

        /* Der neue Einkaufswagen wird an die Session Variable übergeben */
        $_SESSION['ShoppingCart'] = $shoppingCart;
        header("Location: http://localhost/Webshop_Melanie_Sebastian/HTML-PHP/shoppingcart.php?notice=\"".$_POST['ProductToDelete_name']."\" wurde erfolgreich entfernt");
    }
}
else
{
    header("Location: http://localhost/Webshop_Melanie_Sebastian/HTML-PHP/shoppingcart.php");
}
?>