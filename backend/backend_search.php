<?php
    session_start();
    
    include "../includes/siteHeader.php";
    include "../includes/siteFooter.php";
    include "../includes/connectToDB.php";


    pageHead("Backend Suche");

    echo"
        <script language='javascript' type='text/javascript'>
            function dynamicdropdown(listindex)
            {
                switch (listindex)
                {
                case 'Games' :
                    document.getElementById('Kategorie').options[0]=new Option('Kategorie wählen','');
                    document.getElementById('Kategorie').options[1]=new Option('Action','Action');
                    document.getElementById('Kategorie').options[2]=new Option('Adventure','Adventure');
                    document.getElementById('Kategorie').options[3]=new Option('Science-Fiction','Science-Fiction');
                    break;
                case 'Hardware' :
                    document.getElementById('Kategorie').options[0]=new Option('Kategorie wählen','');
                    document.getElementById('Kategorie').options[1]=new Option('Monitore','Monitore');
                    document.getElementById('Kategorie').options[2]=new Option('Tastaturen','Tastaturen');
                    document.getElementById('Kategorie').options[3]=new Option('Mäuse','Maeuse');
                    document.getElementById('Kategorie').options[4]=new Option('Headsets','Headsets');
                    break;
                case 'Fanartikel' :
                    document.getElementById('Kategorie').options[0]=new Option('Kategorie wählen','');
                    document.getElementById('Kategorie').options[1]=new Option('Figuren','Figuren');
                    document.getElementById('Kategorie').options[2]=new Option('Kleidung','Kleidung');
                    document.getElementById('Kategorie').options[3]=new Option('Bettwäsche','Bettwaesche');
                    document.getElementById('Kategorie').options[3]=new Option('Accessories','Accessories');
                    break;
                }
                return true;
            }
        </script>";


    if(isset($_SESSION['mitarbeiter_login_korrekt']) && $_SESSION['mitarbeiter_login_korrekt'] == true)
    {
        if(isset($_POST['Suchart']))
        {
            // Wenn zuvor für Suchart Produkt ID gewählt wurde
            if($_POST['Suchart'] == 'ID')
            {
                $sql = "SELECT Picture_Path, Bezeichnung, Kurzbeschreibung, Preis, ID_Produkt  
                        FROM produkt 
                        WHERE ID_Produkt = ".$_POST['Suchbegriff'].";";
            }
            // Wenn zuvor nicht für Suchart Produkt ID gewählt wurde 
            // dann wird nach Bezeichnung gesucht
            else
            {
                $sql = "SELECT Picture_Path, Bezeichnung, Kurzbeschreibung, Preis, ID_Produkt  
                        FROM produkt 
                        WHERE Bezeichnung LIKE '%".$_POST['Suchbegriff']."%'
                        ORDER BY INSTR(Bezeichnung,'".$_POST['Suchbegriff']."') ASC";
            }

            //SQL-Abfrage an die Datenbank senden
            $result = mysqli_query($dbh,$sql)
            or die ("Fehler bei der QUERY:". $sql);


        echo "  <table class='products_table'>
                    <tr>
                        <th>Bild</th>
                        <th>Bezeichnung</th>
                        <th>Kurzbeschreibung</th>
                        <th>Preis in Euro</th>
                    </tr>";
            
            $h = 0;

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
                                    <form action='backend_modifyProduct.php' method='post'>
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
            echo"</table>";
        }
        else
        {
            echo"   <div class='backend-newDBdataInput-container'>
                        <table>
                            <caption>
                                <div>
                                    <h2>Wonach wollen Sie suchen?</h2>
                                </div>
                            </caption>

                            <form actoin='backend_modifyProduct.php' method='post'>
                                <tr>
                                    <td>
                                        <label for='Suchbegriff'>Suchbegriff/Produkt ID</label>
                                        <input type='textarea' name='Suchbegriff' id='Suchbegriff' required='true'></input>
                                    </td> 
                                </tr>
                                <tr> 
                                    <td>  
                                        <input type='radio' name='Suchart' value='ID' id='id' required='true'></input>
                                        <label for='ID'>Produkt ID</label>
                                        
                                        <input type='radio' name='Suchart' value='Bezeichnung' id='bezeichznung'></input>
                                        <label for='bezeichnung'>Bezeichnung</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type='submit' value='Suchen' class='button buttonSmall'></input>
                                    </td>
                                </tr>
                            </form>
                        </table>
                    </div>";
        }
    }
    else
    {
        echo "  <div class='backend-newDBdataInput-container'>
                    <table>
                        <tr> <td> <h1>Sie haben keinen Zugriff auf diese Seite!</h1> </td> </tr>
                        <tr> <td>Sie müssen sich zuerst einloggen</td> </tr>
                        <tr> 
                            <td>Hier gehts zum Login: <br><br>
                                <form action='index.php'>
                                    <input type='submit' value='Zum Login'>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>";  
    }
    
    pageFooter();

?>