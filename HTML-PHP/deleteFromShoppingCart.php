<?php 
    session_start();

    include "../includes/searchForID_Product.php";

    if(isset($_POST['ProductToDelete']))
    {
        //ID der zu löschenden Produktes holen
        $productToDelete = intval($_POST['ProductToDelete']);
        
        //Wenn die ID des zu löschenden Produktes gleich null ist,
        //dann wird der gesammte Einkaufswagen geleert
        if($productToDelete == 0)
        {
            $_SESSION['ShoppingCart'] = array( array( 'ID_Produkt' => NULL, 'Menge' => NULL) );
            //Weiterleitung zum Einkaufswagen
            header("Location: shoppingcart.php?notice=Ihr Einkaufswagen wurde geleert");
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
            header("Location: shoppingcart.php?notice=\"".$_POST['ProductToDelete_name']."\" wurde erfolgreich entfernt");
        }
    }
    //Wenn keine Produkt-ID zum löschen gesetzt ist, dann wird der
    //benutzer zum Einkaufswagen weitergeleitet
    else
    {
        header("Location: shoppingcart.php");
    }
?>