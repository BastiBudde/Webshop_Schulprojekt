<?php
    session_start();   
    
    include "../includes/siteHeader.php";
    include "../includes/siteFooter.php";
    include "../includes/connectToDB.php";


    pageHead("Bestellung Abgeschlossen");

    echo"<div class='orderCompleteMsg'>
            <h2>Vielen Dank für Ihre Bestellung!<br><br></h2>
            <p>Ihre Bestellung wurde erfolgreich abgeschlossen und befindet sich jetzt in Bearbeitung.</p>
            <p> Sie werden von uns per E-Mail über den Status ihrer Bestellung am laufenden gehalten. Sobald Ihr Paket versandt wurde werden wir Ihnen die Versandinformationen übermitteln.</p>
            <p><a href='bestellung_showReceipt.php' target='_blank'>Rechnung anzeigen</a></p>
            <p>
                <br>
                <a href='../index.php' class='button buttonNormal'>Zurück zum Shop</a>
            </p>
        </div>";

    pageFooter();

?>