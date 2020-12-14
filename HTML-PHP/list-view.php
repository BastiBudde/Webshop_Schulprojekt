<?php
    session_start();
    
    include "../includes/siteHeader.php";
    include "../includes/siteFooter.php";
    
    if(isset($_GET['Sparte']))
    {
        $title = htmlspecialchars($_GET['Sparte']);
    }
    if(isset($_GET['Kategorie']))
    {
        $title = htmlspecialchars($_GET['Kategorie']);
    }

    pageHead($title);
                    
    if((isset($_GET['Sparte'])) || (isset($_GET['Kategorie'])))
    {
        include "../includes/connectToDB.php";
        
        $h = 0; // Laufvariable

        if(isset($_GET['Sparte']))
        {
            $sparte = $_GET['Sparte'];
        }
        else
        {
            $sparte = null;
        }

        if(isset($_GET['Kategorie']))
        {
            $kategorie = $_GET['Kategorie'];
        }
        else
        {
            $kategorie = null;
        }

        //SQL-Abfrage aufstellen jenachdem ob eine einzelne Kategorie oder die ganze Sparte angesehen wergen möchte
        if(!($sparte == null))
        {
            $sql = "SELECT Picture_Path, Bezeichnung, Kurzbeschreibung, Preis, ID_Produkt  FROM produkt WHERE Sparte = '$sparte'";
            $ueberschrift = $sparte;
        }
        elseif(!($kategorie == null))
        {
            $sql = "SELECT Picture_Path, Bezeichnung, Kurzbeschreibung, Preis, ID_Produkt FROM produkt WHERE Kategorie = '$kategorie';";
            
            if($kategorie == 'Maeuse')
            {
                $ueberschrift = 'Mäuse';
            }
            else
            {
                $ueberschrift = $kategorie;
            }
        }

        //SQL-Abfrage an die Datenbank senden
        $result = mysqli_query($dbh,$sql)
            or die ("Fehler bei der QUERY");


        echo "  <table class='products_table'>
                    <caption>" . $ueberschrift . "</caption>
                    <tr>
                        <th>Bild</th>
                        <th>Bezeichnung</th>
                        <th>Kurzbeschreibung</th>
                        <th>Preis in Euro</th>
                    </tr>";
            
        //Ergebnis der SQL-Abfrage verarbeiten
        while($row=mysqli_fetch_row($result))
        {
            echo "<tr>";
            foreach($row as $i)
            {
                if($h == 0)
                {
                    $i = "../" . $i;
                    echo "  <td id='table_zellen_bild'> 
                                <form action='product-view.php' method='get'>
                                    <input type='hidden' name='ID_Produkt' value='$row[4]'> 
                                    <input class='products_table_img' type='image' src='$i' alt='$i'>
                                </form> 
                            </td>";
                }
                else if($h == 1)
                {
                    echo "<td id='table_zellen_bezeichnung'> $i </td>";
                }
                else if($h == 2)
                {
                    echo "<td id='table_zellen_kurzbeschreibung'> $i </td>";
                }
                else if($h == 3)
                {
                    echo "<td id='table_zellen_preis'> $i €</td>";
                }
                $h++;
            }
            echo "</tr>";
            $h = 0;
        }
        echo "</table>";
        
        //Datenbankverbindung schließen
        mysqli_close($dbh);
    }

    pageFooter();
?>