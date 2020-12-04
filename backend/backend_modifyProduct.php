<?php
    session_start();   

    if(!isset($_POST['ID_Produkt']))
    {
        header("Location: http://localhost/Webshop_Melanie_Sebastian/backend/backend_search.php");
    }
    
    include "../includes/siteHeader.php";
    include "../includes/siteFooter.php";
    include "../includes/connectToDB.php";


    pageHead("Produkt Bearbeiten");

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
                    document.getElementById('Kategorie').remove(4);
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
                    document.getElementById('Kategorie').options[4]=new Option('Accessories','Accessories');
                    break;
                }
                return true;
            }
        </script>";


    if(isset($_SESSION['mitarbeiter_login_korrekt']) && $_SESSION['mitarbeiter_login_korrekt'] == true)
    {
        //SQL-Abfrage aufstellen
        $sql = "SELECT Bezeichnung, Kurzbeschreibung,  Beschreibung, Preis, Sparte, Picture_Path, Bilderquelle
                FROM produkt
                WHERE ID_Produkt = ".$_POST['ID_Produkt'];


        //SQL-Abfrage an die Datenbank senden
        $result = mysqli_query($dbh,$sql)
        or die ("Fehler bei der QUERY" . mysqli_error($dbh));

        $fetched_result = mysqli_fetch_row($result);

        echo "
            <div class='backend-newDBdataInput-container'>

                    <table>

                        <caption>
                            <div>
                                <h2>Produkt Bearbeiten</h2>
                                <form action='backend-logout.php'>
                                    <input type='submit' value='Logout' class='button buttonSmall'>
                                </form>
                            </div>
                        </caption>";

                echo"          
                                        
                    <form action='updateDB.php' method='POST'>
                        <input type='hidden' name='ID_ProduktToUpdate' value='".$_POST['ID_Produkt']."'></input>
                        
                        <tr>
                            <td> <label for='Bezeichnung'>Bezeichnung</label> </td>
                            <td> <input type='text' value='".$fetched_result[0]."'id='Bezeichnung' class='Bezeichnung' name='Bezeichnung' required='true' maxlength='35'> </td>
                        </tr>
                        <tr>
                            <td> <label for='Kurzbeschreibung'>Kurzbeschreibung</label> </td>
                            <td> <textarea rows='5' cols='60' id='Kurzbeschreibung' name='Kurzbeschreibung' required='true'>".str_replace("<br />", "", $fetched_result[1])."</textarea></td>
                        </tr>
                        <tr>
                            <td> <label for='Beschreibung'>Beschreibung</label> </td>
                            <td> <textarea rows='15' cols='60' id='Beschreibung' name='Beschreibung' required='true'>".str_replace("<br />", "", $fetched_result[2])."</textarea></td>
                        </tr>
                        <tr>
                            <td> <label for='Preis'>Preis</label> </td>
                            <td> <input type='number' value='".floatval($fetched_result[3])."' id='Preis' name='Preis' required='true' min='0' max='999.99' step='0.01'> </td>
                        </tr>
                        <tr>
                            <td> <label for='Sparte'>Sparte</label> </td>
                            <td> 
                                <select id='Sparte' name='Sparte' required='true' onchange='javascript: dynamicdropdown(this.options[this.selectedIndex].value);'>
                                    <option value=''>Sparte Wählen</option>
                                    <option value='Games'>Games</option>
                                    <option value='Hardware'>Hardware</option>
                                    <option value='Fanartikel'>Fanartikel</option>
                                </select>
                            </td> 
                        </tr>
                        <tr>
                            <td> <label for='Kategorie'>Kategorie</label> </td>
                            <td> 
                                <script type='text/javascript' language='JavaScript'>
                                    document.write(\"<select name='Kategorie' id='Kategorie' required='true'><option value=''>Select Kategorie</option></select>\")
                                </script>
                                <noscript>
                                    <select id='Kategorie' name='Kategorie'>
                                    </select>
                                </noscript>
                            </td> 
                        </tr>
                        <tr>
                            <td> <label for='Picture_Path'>Bilder-Pfad*</label> </td>
                            <td> <input type='text' value='".$fetched_result[5]."' id='Picture_Path' name='Picture_Path' required='true' value='Bilder/'> </td>
                        </tr>
                        <tr>
                            <td> <label for='Bilderquelle'>Bilderquelle</label> </td> 
                            <td> <input type='text' value='".$fetched_result[6]."' id='Bilderquelle' name='Bilderquelle' required='true'> </td>
                        </tr>
                        <tr>
                            <td colspan='2'>
                                <div class='flex-DirRow flex-SpaceBetween'> 
                                    <input type='submit' value='Speichern' class='button buttonNormal'></input>
                                    <a href='deleteProduct.php?productToDelete=".$_POST['ID_Produkt']."' class='button buttonNormal' onclick='return confirm(\"Wollen Sie dieses Produkt wirklich löschen?\");'>Löschen</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan='3'> <div> <br> <br>*Bilder müssen in das verzeichnis 'Bilder' mit dem hier angegebenen Namen kopiert werden</div> </td>
                        </tr>

                    </form>

                </table>

        </div>"; 

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