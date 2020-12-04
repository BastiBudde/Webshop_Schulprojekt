<?php
    
    session_start();

    if(isset($_SESSION['mitarbeiter_login_korrekt']) && $_SESSION['mitarbeiter_login_korrekt'] == true)
    {
        header("Location: http://localhost/Webshop_Melanie_Sebastian/backend/backend_uebersicht.php");
    }
    
    include "../includes/siteHeader.php";
    include "../includes/siteFooter.php";


    pageHead("Backend login");
                   
               echo"<div class='logindata-container'>

                        <form action='backend-login.php' method='POST'>
                            <div class='flex-DirCol flex-Center'>
                                <div>
                                    <input class='inputForm longInput' id='username' type='text' name='username' placeholder='Benutzer' required='true'>
                                    <input class='inputForm longInput' id='password' type='password' name='password' placeholder='Passwort' required='true'>
                                </div>

                                <div class='flex-DirRow flex-SpaceBetween'>
                                    <input type='submit' class='button buttonSmall' value='Absenden'>
                                </div>
                            </div> 
                        </form>

                    </div>";
   
    pageFooter();
?>