<?php 
session_start ();

include "../includes/searchForID_Product.php";

//Überprüfen ob eine Produkt-ID und eine Neue Menge gesetzt wurden
if(isset($_POST['ProductToUpdate']) && isset($_POST['NewAmount']))
{
    $productToUpdate = intval($_POST['ProductToUpdate']);
    $newAmount = intval($_POST['NewAmount']);
    $shoppingCart = $_SESSION['ShoppingCart'];

    //Index des zu aktualisierenden Produktes herausfinden
    $indexOfProduct = searchForID_Product($productToUpdate, $shoppingCart);

    //Neue Menge setzen
    $shoppingCart[$indexOfProduct]['Menge'] = $newAmount;

    //Neuen Einkaufswagen an Session-Einkaufswagen übergeben
    $_SESSION['ShoppingCart'] = $shoppingCart;

    //Weiterleitung zum Einkaufswagen
    header("Location: shoppingcart.php?notice=Ihre Änderungen wurden gespeichert");
}
//Wurde keine Produkt-ID und keinen neue Menge gesetzt
//wird der Benutzer hier zum Einkaufswagen weitergeleitet
else
{
    header("Location: shoppingcart.php");
}
?>