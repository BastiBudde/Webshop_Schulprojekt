<?php
    session_start();   
    
    include "../includes/siteHeader.php";
    include "../includes/siteFooter.php";
    include "../includes/connectToDB.php";


    pageHead("Bestellung Abgeschlossen");

    echo"<div class='orderCompleteMsg'>
            <h2>Vielen Dank!</h2>
            <p>Ihre Bestellung wurde erfolgreich abgeschlossen und befindet sich jetzt in Bearbeitung. Sie werden von uns per E-Mail über den Status ihrer Bestellung am laufenden gehalten. Sobald Ihr Paket versendet wurde werden wir Ihnen die Versandinformationen übermitteln.</p>
            <a>Rechnung anzeigen</a>
        </div>";

    pageFooter();

?>