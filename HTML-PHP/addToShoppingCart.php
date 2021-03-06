<?php
    session_start();

    include "../includes/searchForID_Product.php";

    if(isset($_POST['ProductToAdd']))
    {
        /*  Wenn das shoppingCart-Array noch nicht existiert wird es hier Initialisiert.
            Das Array soll Später wie folgt aufgebaut sein:
                $_SESSION['shoppingCart'] = array(
                    array(
                        'ID_Produkt' => 'z.B.: 1',
                        'Menge' => 'z.B.: 2',
                    ),
                    array(
                        'ID_Produkt' => '',
                        'Menge' => '',
                    ),
                    ...
                );
        */
        if(!(isset($_SESSION['ShoppingCart'])))
        {
            $_SESSION['ShoppingCart'] = array( array( 'ID_Produkt' => NULL, 'Menge' => NULL) );
        }

        /* Alten Einkaufswagen holen */
        $shoppingCart = $_SESSION['ShoppingCart'];
        $productToAdd = intval($_POST['ProductToAdd']);

        /* Bestimmen ob das Produkt bereits im Shoppingcart-Array vorhanden ist oder nicht */
        if(searchForID_Product($productToAdd,$shoppingCart) === FALSE)
        {
            /* Wird kein Element mit der ID des hinzuzufügenden Produkt gefunden wird es hir hinzugefügt */
            $shoppingCart[] = array('ID_Produkt' => $productToAdd, 'Menge' => 1);
        }
        else
        {
            /* Falls ein Element mit der ID des hinzuzufügenden Produkt gefunden wird, wird hier die Menge um 1 erhöht */
            $shoppingCart[searchForID_Product($productToAdd,$shoppingCart)]['Menge']++;
        }

        /*  Nachdem das ShoppingCart-Array in einer Session Variable initialisiert wurde hat das erste Element die Werte NULL und NULL.
            Deshalb wird dieses Element hier entfernt falls es noch nicht geschehen ist.  */
        if($shoppingCart[0]['ID_Produkt'] == NULL && $shoppingCart[0]['Menge'] == NULL)
        {
            array_shift($shoppingCart);
        }

        /* Neuen Einkaufswagen wieder in Session-Variable abspeichern */
        $_SESSION['ShoppingCart'] = $shoppingCart;

        /*  Weiterleitung auf die Produktansicht-Seite des gerade hinzugefügten Produktes
            Durch den GET-Parameter "AddedToShoppingCart" in der URL wir dort dann ein Link
            zum Einkaufswagen und die Nachricht, dass das Produkt erfolgreich hinzugefügt wurde, angeteigt */
        header("Location: product-view.php?ID_Produkt=" . $productToAdd . "&AddedToShoppingCart=TRUE");

    }
    //Wenn kein Produkt zum hinzufügen gesetzt ist, dann wird der 
    //Benutzer hier zur Startseite weitergeleitet
    else
    {
        header("Location: ../index.php");
    }
?>