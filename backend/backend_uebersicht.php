<?php
    include "../includes/siteHeader.php";
    include "../includes/siteFooter.php";


    pageHead("Backend Übersicht");

    if(isset($_SESSION['mitarbeiter_login_korrekt']) && $_SESSION['mitarbeiter_login_korrekt'] == true)
    {

        if(isset($_GET['notice']))
        {
            echo "
                <div class='notice-box'> 
                    ".$_GET['notice']."
                </div>";
        }

        echo "
        <div class='backend-newDBdataInput-container'>

                <table>

                    <caption>
                        <div>
                            <h2> Willkommen " . $_SESSION['mitarbeiter_Vorname'] . " " . $_SESSION['mitarbeiter_Nachname'] . "! </h2> 
                            
                            <form action='backend-logout.php'>
                                <input type='submit' value='Logout' class='button buttonSmall'>
                            </form>
                        </div>
                    </caption>
                
                    <tr>
                        <td>
                            <a href='backend_insertProduct.php' class='button buttonNormal'>Produkt einfügen</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href='backend_search.php' class='button buttonNormal'>Produkt bearbeiten</a>
                        </td>
                    </tr>
                
                </table>";
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