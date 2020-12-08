<?php
    // Folgender Code stammt von der Webseite: https://www.php-einfach.de/experte/php-codebeispiele/pdf-per-php-erstellen-pdf-rechnung/
    // Autor: Nils Reimers
    // Modifizeirt von: Sebastian Budde
    // Der Teil in welchem eine PDF erstellt wird wurde entfernt. Die Rechnung kann auch aus dem Browser heraus gedruckt werden
    
    session_start();
    include "../includes/connectToDB.php";

    //Damit Wochentage auf Deutsch ausgegeben werden
    setlocale (LC_ALL, 'de_DE@euro', 'de_DE', 'de', 'ge');

    // Abfrage um die Bestellung(mit ID_Bestellung, Timestamp und Versandinformationen) zu bekommen
    $sql = "SELECT Timestamp, Name, Vorname, E_Mail, Strasse_Hausnr, PLZ, Ort, Telefon
            FROM bestellung
            WHERE ID_Bestellung = ".$_SESSION['ID_Bestellung'].";";

    $orderInfo_unfetched = mysqli_query($dbh, $sql)
                    or die("Fehler bie der Query: " . mysqli_error($dbh));
    
    $orderInfo = mysqli_fetch_row($orderInfo_unfetched);

    
    $rechnungs_nummer = $_SESSION['ID_Bestellung'];
    $rechnungs_datum = strftime("%A %e. %B %G", strtotime($orderInfo[0]));

    $rechnungs_empfaenger = $orderInfo[2]." ".$orderInfo[1]."<br>".
                            $orderInfo[4]."<br>".
                            $orderInfo[5]." ".$orderInfo[6]."<br>".
                            $orderInfo[3];
    
    if($orderInfo[7] != NULL)
    {
        $rechnungs_empfaenger .= "<br>".$orderInfo[7];
    }

    // Abfrage um die Produkte der Bestellung(mit ID_Produkt und Bezeichnung, Menge und Stückpreis) zu bekommen
    $sql = "SELECT  produkt.ID_Produkt, produkt.Bezeichnung, bestellung_produkt.Menge, bestellung_produkt.stk_preis
            FROM bestellung, produkt, bestellung_produkt 
            WHERE   bestellung.ID_Bestellung = bestellung_produkt.ID_Bestellung 
                AND produkt.ID_Produkt = bestellung_produkt.ID_Produkt 
                AND bestellung.ID_Bestellung = " . $_SESSION['ID_Bestellung'] . ";";

    $produkte_unfetched = mysqli_query($dbh, $sql)
                            or die("Fehler bei der Query: ".mysqli_error($dbh));

    //Auflistung eurer verschiedenen Posten im Format [Produkt ID, Produktbezeichnung, Menge, Einzelpreis]
    while($item = mysqli_fetch_row($produkte_unfetched))
    {
        $rechnungs_posten[] = array($item[0], $item[1], $item[2], $item[3]);
    }

    echo"<!DOCTYPE html>
        <html lang='de' style='backgroung-color: #000000;'>
            <head>
                <meta charset='UTF-8'>
                <title>Bestellung Nr.: ".$rechnungs_nummer."</title>
                <style>
                    body 
                    {
                        width: 19cm;
                        margin: 0 auto;
                        padding: 2cm;
                    }
                </style>
            </head>
            <body>
                <table cellpadding='5' cellspacing='0' style='width: 100%; '>
                    <tr>
                        <td>
                            <img src='../Bilder/GamingHeavenLogo.svg' height='100px'>
                            <div style='padding: 15px;'>
                                GemingHeaven GmbH. <br>
                                Melanie Meyer u. Sebastian Budde <br>
                                www.GamingHeaven.de <br>
                            </div>
                        </td>
            
                        <td style='text-align: right'>
                            Rechnungsnummer ".$rechnungs_nummer."<br>
                            Rechnungsdatum: ".$rechnungs_datum."<br>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan='2'>
                        <div style='padding: 15px;'>
                            <span style='font-size:1.3em; font-weight: bold;'>
                                Rechnung<br><br>
                            </span>
                            ".nl2br(trim($rechnungs_empfaenger))."
                            </td>
                        </div>
                    </tr>
                </table>
                <br>
            
            <table cellpadding='5' cellspacing='0' style='width: 100%;' border='0'>
        
                <tr style='background-color: #cccccc; padding:5px;'>
                    <td ><b>Pos.</b></td>
                    <td ><b>ProduktNr.</b></td>
                    <td ><b>Bezeichnung</b></td>
                    <td style='text-align: center;'><b>Menge</b></td>
                    <td style='text-align: center;'><b>Einzelpreis</b></td>
                    <td style='text-align: center;'><b>Preis</b></td>
                </tr>";
            
            $gesamtpreis = 0;
            $pos = 1;

            foreach($rechnungs_posten as $posten) 
            {
                $preis = $posten[2]*$posten[3];
                $gesamtpreis += $preis;
                echo "  <tr>
                                <td style='width: 50px;'>".$pos."</td>
                                <td style='width: 100px;'>".$posten[0]."</td>
                                <td>".$posten[1]."</td>
                                <td style='text-align: center;'>".$posten[2]."</td> 
                                <td style='text-align: center;'>".number_format($posten[3], 2, ',', '')." Euro</td>	
                                <td style='text-align: center;''>".number_format($preis, 2, ',', '')." Euro</td>
                            </tr>";
                $pos ++;
            }

            echo"   <tr>
                        <td colspan='2' style='border-top: 1px solid #000000;'><b>Gesamtsumme: </b></td>
                        <td style='border-top: 1px solid #000000;'></td>
                        <td style='border-top: 1px solid #000000;'></td>
                        <td style='border-top: 1px solid #000000;'></td>
                        <td style='text-align: center; border-top: 1px solid #000000;'><b>".number_format($gesamtpreis, 2, ",", "")." Euro</b></td>
                    </tr> 
                    <tr>
                        <td colspan='4'><br>Alle Preise werden inklusive 19% MwSt. angegeben.</td>
                    </tr>
                </table>
                <br><br>
                Wir bitten um eine Begleichung der Rechnung innerhalb von 14 Tagen nach Erhalt. Bitte Überweisen Sie den vollständigen Betrag an:
                <br> <br>
                <table>
                    <tr>
                        <td><b>Empfänger:</b></td>
                        <td>Gaming Heaven GmbH.</td>   
                    </tr>
                    <tr>
                        <td><b>IBAN:</b></td>
                        <td>DE12 345678 901234 567890</td>   
                    </tr>
                    <tr>
                        <td><b>BIC:</b></td>
                        <td>C46X453AD</td>   
                    </tr>
                </table>
            </body>
        </html>";
?>