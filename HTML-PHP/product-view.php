<?php
    session_start();
    
    include "../includes/siteHeader.php";
    include "../includes/siteFooter.php";
    include "../includes/connectToDB.php";

    //ID des Produktes welches angesehen werden soll besorgen
    $id_produkt = $_GET['ID_Produkt'];

    //SQL-Abfrage aufstellen
    $sql = "SELECT Picture_Path, Bezeichnung, Kurzbeschreibung, Beschreibung, Preis, Bilderquelle, ID_Produkt FROM produkt WHERE ID_Produkt ='$id_produkt'";

    //SQL-Abfrage an die Datenbank senden
    $result = mysqli_query($dbh,$sql)
    or die ("Fehler bei der QUERY");

    //Datenbankverbindung schließen
    mysqli_close($dbh);

    //Ergebnis der SQL-Abfrage verarbeiten
    $row=mysqli_fetch_row($result);

    /*  Wenn z.B. der User manuell in der URL für den Wert ID_Produkt einen Wert eingegeben hat für welchen es kein Produkt in der Datenbank gibt,
        so wird der User einfach zurück zur Startseite gesendet */
    if(empty($row))
    {
        header("Location: ../index.php");
    }


    $product_name = $row[0];

    pageHead($product_name);

    echo"
        <table class='product-view-table'>
            <tr>
                <td rowspan='3' id='product-view-table_img-zelle'>
                    <a href='$row[5]'> 
                        <img class='product-view-img' src=\"../$row[0]\" alt='$row[0]'> 
                    </a>
                </td>
                <td id='product-view-table_bezeichnungs-zelle' height='75px'>
                    $row[1]
                </td>
            </tr>
            <tr>
                <td id='product-view-table_preis-zelle'>
                        <form action='addToShoppingCart.php' method='POST'>
                            <label for='ID_Produkt'>$row[4]€</label>
                            <input type='hidden' name='ProductToAdd' value='$row[6]'>
                            <input class='button buttonNormal fontBold' type='submit' type='submit' value='In den Einkaufswagen!'>
                        </form>
                </td>
            </tr>
            <tr>
                <td id='product-view-table_kurzBeschreibungs-zelle'>$row[2]</td>
            </tr>
            <tr>
                <td colspan='2' id='product-view-table_beschreibungs-zelle'>
                    <span style='font-weight:bold; font-size:28px;'>Beschreibung:</span> <br>" . $row[3] . "
                </td>
            </tr>
        </table>";

    if(isset($_GET['AddedToShoppingCart']) && $_GET['AddedToShoppingCart'] == True)
    {
        echo"
            <div class='notice-box'>
                &#10004;&#65039; Erfolgreich hinzugefügt! <br>
                <a href='shoppingcart.php'>Hier zum Einkaufswagen</a>
            </div>";
    }

    pageFooter();
?>