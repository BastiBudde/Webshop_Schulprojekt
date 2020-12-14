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

        mysqli_close($dbh);

        header("Location: user-viewOrders.php?notice=Erfolgreich Storniert!");
    }
    else
    {
        header("Location: user-viewOrders.php");
    }
?>