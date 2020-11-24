<?php 
session_start ();

function searchForID_Product($ID_Produkt, $array)
{
    $n = 0;
    foreach ($array as $item)
    {
        if($item['ID_Produkt'] == $ID_Produkt)
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