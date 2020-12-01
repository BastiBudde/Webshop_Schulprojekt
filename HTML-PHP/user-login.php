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
    
    echo"   <div class='logindata-container'>
                <table>
                    <form action='user-login-verification.php' method='POST'>";

                            if(isset($_GET['login_failure']) && $_GET['login_failure'] == 1)
                            {
                                echo "
                                    <caption>
                                        <h2>Benutzer existiert nicht!<h2>
                                    </caption>";
                            }
                            elseif(isset($_GET['login_failure']) && $_GET['login_failure'] == 2)
                            {
                                echo "
                                    <caption>
                                        <h2>Benutzername und Passwort stimmen nicht überein!<h2>
                                    </caption>";
                            }
                    
                   echo"<tr>
                            <td>
                                <div class='flex-DirCol flex-Center'>
                                    <div> 
                                        <input class='inputForm longInput' id='e-Mail' type='text' name='e-Mail' size='30' placeholder='E-Mail' required='true'> 
                                        <input class='inputForm longInput' id='password' type='password' name='password' size='30' placeholder='Passwort' required='true'>
                                    </div>

                                    <div class='flex-DirRow flex-SpaceBetween'>
                                        <input type='submit' class='button buttonSmall' value='Absenden'>
                                        <a href='user-create_account.php' class='button buttonSmall'>Konto erstellen</a>
                                    </div>
                                <div>
                            </td>
                        </tr>

                    </form>    
                </table>
            </div>";
    
    pageFooter();
?>