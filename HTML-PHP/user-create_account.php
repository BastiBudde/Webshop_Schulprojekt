<?php
    session_start();
    
    include "../includes/siteHeader.php";
    include "../includes/siteFooter.php";
    include "../includes/connectToDB.php";

    pageHead("Konto erstellen");


    echo   "<table class='costomerInformationTable'>
                <caption>Bitte geben Sie ihre Kontaktdaten an! <br><br></caption>
                
                <form action='user-createUserInDB.php' method='post'>
                    <tr>
                        <td>
                            <label for='Vorname'>Vorname*</label>
                            <input type='text' name='Vorname' class ='inputForm shortInput' id='Vorname' required='true' placeholder='Max'></input>
                        </td>
                        <td>
                            <label for='Nachname'>Nachname*</label>
                            <input type='text' name='Nachname' class ='inputForm shortInput' id='Nachname' required='true' placeholder='Mustermann'></input>
                        </td>
                    </tr>

                    <tr>
                        <td colspan='2'>
                            <label for='Str_HausNr'>Straße und Hausnr.*</label>
                            <input type='text' name='Strasse_Hausnr' class ='inputForm longInput' id='Str_HausNr' required='true' placeholder='Musterstraße 4'></input>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for='PLZ'>PLZ*</label>
                            <input type='number' name='PLZ' class='numInptWithoutArrows inputForm shortInput' id='PLZ' required='true' placeholder='11011'></input>
                        </td>
                        <td>
                            <label for='Ort'>Ort*</label>
                            <input type='text' name='Ort' class ='inputForm shortInput' id='Ort' required='true' placeholder='Musterstedt'></input>
                        </td>
                    </tr>

                    <tr>
                        <td colspan='2'>
                            <label for='Telefon'>Telefon</label>
                            <input type='text' name='Telefon' class ='inputForm longInput' id='Telefon' placeholder='123 456 7890'></input>
                        </td>
                    </tr>

                    <tr>
                        <td colspan='2'>
                            <label for='E_Mail'>E-Mail*</label>
                            <input type='email' name='E_Mail' class ='inputForm longInput' id='E_Mail' required='true' placeholder='example@example.com'></input>
                        </td>
                    </tr>

                    <tr>
                        <td colspan='2'>
                            <label for='Passwort'>Passwort*</label>
                            <input type='text' name='Passwort' class ='inputForm longInput' id='Passwort' required='true' placeholder='Z*ifb2PH$@oH-#>'></input>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan='2'>
                            <label>Mit * markierte Felder sind Pflichtfelder</label>
                            <input type='hidden' name='checkoutAsGuest' value=''></input>
                            <input type='submit' class='button buttonNormal' value='Weiter'></input>
                        </td>
                    </tr>

                </form>
                
            </table>";

    pageFooter();
?>