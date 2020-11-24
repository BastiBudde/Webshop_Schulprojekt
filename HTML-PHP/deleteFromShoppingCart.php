<?php 
session_start();

function searchForID_Product($ID_Produkt, $array)
{
    $n = 0;
    foreach ($array as $item)
    {
        if($item['ID_Produkt'] === $ID_Produkt)
        {
            return $n;
        }
        else
        {
            $n++;
        }
    }
    return FALSE;
}

if(isset($_POST['ProductToDelete']))
{
    $productToDelete = intval($_POST['ProductToDelete']);
    $shoppingCart = $_SESSION['ShoppingCart'];

    /* Anhand der ID des zu entfernenden Produktes wird der Index im SohppingCart-Array ermittelt */
    $indexOfProduct = searchForID_Product($productToDelete, $shoppingCart);

    /* Entfernt ein das Element mit der zu entfernenden Produkt-ID */
    array_splice($shoppingCart, $indexOfProduct, 1);

    /* Der neue Einkaufswagen wird an die Session Variable übergeben */
    $_SESSION['ShoppingCart'] = $shoppingCart;

    header("Location: http://localhost/Webshop_Melanie_Sebastian/HTML-PHP/shoppingcart.php");
}
else
{
    header("Location: http://localhost/Webshop_Melanie_Sebastian/HTML-PHP/shoppingcart.php");
}
?>