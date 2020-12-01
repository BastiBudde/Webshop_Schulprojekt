<?php
    session_start();
    
    if(isset($_SESSION['user_login_korrekt']) && $_SESSION['user_login_korrekt'] == true)
    {
        header("Location: http://localhost/Webshop_Melanie_Sebastian/HTML-PHP/user-uebersicht.php");
    }
    
    include "../includes/siteHeader.php";
    include "../includes/siteFooter.php";
    include "../includes/connectToDB.php";

    pageHead("Login");
    
    echo"   <div class='backend-logindata-container'>
                <table>
                    <form action='user-login-verification.php' method='POST'>";

                            if(isset($_GET['login_failure']) && $_GET['login_failure'] == 1)
                            {
                                echo "
                                    <tr>
                                        <td> <h2>Benutzer existiert nicht!<h2> </td>
                                    </tr>";
                            }
                            elseif(isset($_GET['login_failure']) && $_GET['login_failure'] == 2)
                            {
                                echo "
                                    <tr>
                                        <td> <h2>Benutzername<h2> </td>
                                        <td> <h2> und Passwort stimmen nicht überein!<h2> </td>
                                    </tr>";
                            }
                    
                   echo"<tr>
                            <td> <input id='e-Mail' type='text' name='e-Mail' size='30' placeholder='E-Mail' required='true'> </td>
                        </tr>
                        <tr>
                            <td> <input id='password' type='password' name='password' size='30' placeholder='Passwort' required='true'> </td>
                        </tr>
                        <tr>
                            <td> 
                                <div class='flex-DirRow flex-SpaceBetween'>
                                    <input type='submit' class='button buttonSmall' value='Absenden'>
                                    <a href='user-create_account.php' class='button buttonSmall'>Konto erstellen</a>
                                </div>
                            </td>
                        </tr>

                    </form>    
                </table>
            </div>";
    
    pageFooter();
?>