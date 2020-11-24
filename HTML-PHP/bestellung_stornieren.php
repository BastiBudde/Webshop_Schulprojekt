<?php
    if(isset($_POST['orderIdToCancel']))
    {
        include "../includes/connectToDB.php";
        $orderIdToCancel = $_POST['orderIdToCancel'];

        $sql = "UPDATE bestellung
                SET status = 'Storniert'
                WHERE ID_Bestellung = $orderIdToCancel";

        mysqli_query($dbh, $sql)
            or die('Fehler bei der Stornierung!');

        header("Location: http://localhost/Webshop_Melanie_Sebastian/HTML-PHP/user-viewOrders.php");
    }
    else
    {
        header("Location: http://localhost/Webshop_Melanie_Sebastian/HTML-PHP/user-viewOrders.php");
    }
?>