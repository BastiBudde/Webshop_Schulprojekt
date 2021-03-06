<?php
    /*  Auf dieser Seite muss der Nutzer, wenn er nicht schon mit einem Account eingeloggt ist,
        auswählen ob er als Gast fortfahren, sich einloggen oder einen Account erstellen will.
        Wählt der Benutzer die Option als Gast fortzufahren wird der GET-Paramter "checkoutAsGuest"
        gesetzt und die Seite wird neu geladen. Jetzt erscheint ein Formular in welchem der Gast
        seine Kontaktdaten eingeben kann. */

    session_start();

    /*  Falls der Benutzer bereits eingeloggt ist wird er direkt zur Bestellübersicht weitergeleitet da
        dien Anschrift des Benutzers bereits beim Einloggen in Session-Variablen gespeichert wurde */
    if(isset($_SESSION['user_login_korrekt']))
    {
        header("Location: bestellung_uebersicht.php");
    }
    
    include "../includes/siteHeader.php";
    include "../includes/siteFooter.php";


    pageHead("Bestellinformationen");

    echo"<div>";


        if(isset($_GET['checkoutAsGuest']))
        {
           echo"<form id='form' action='bestellung_uebersicht.php' method='post'>
                    <table class='costomerInformationTable'>
                    
                        <caption> <h3>Bitte geben Sie ihre Kontaktdaten an!</h3> <br><br></caption>
                    
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
                                <label for='E_Mail'>E-Mail*</label>
                                <input type='email' name='E_Mail' class ='inputForm longInput' id='E_Mail' required='true'  placeholder='example@example.com'></input>
                            </td>
                        </tr>

                        <tr>
                            <td colspan='2'>
                                <label for='Str_HausNr'>Straße und Hausnr.*</label>
                                <input type='text' name='Strasse_Hausnr' class ='inputForm longInput' id='Str_HausNr' required='true'  placeholder='Musterstraße 4'></input>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for='PLZ'>PLZ*</label>
                                <input type='number' name='PLZ' class='numInptWithoutArrows inputForm shortInput' id='PLZ' required='true' placeholder='11011'></input>
                            </td>
                            <td>
                                <label for='Ort'>Ort*</label>
                                <input type='text' name='Ort' class ='inputForm shortInput' id='Ort' required='true'  placeholder='Musterstedt'></input>
                            </td>
                        </tr>

                        <tr>
                            <td colspan='2'>
                                <label for='Telefon'>Telefon</label>
                                <input type='text' name='Telefon' class ='inputForm longInput' id='Telefon' placeholder='123 456 7890'></input>
                            </td>
                        </tr>
                        
                        <tr>
                            <td><label>Mit * markierte Felder sind Pflichtfelder</label></td>
                        </tr>

                        <tr>
                            <td colspan='2'>
                                <div class='flex-DirRow flex-SpaceBetween'>
                                    <a href='shoppingcart.php' class='button buttonNormal'>Zurück zum Einkaufswagen</a>

                                    <input type='hidden' name='checkoutAsGuest' value=''></input>
                                    <input type='submit' class='button buttonNormal' value='Weiter'></input>
                                </div>
                            </td>
                        </tr> 
                        
                    </table>
                </form>";
        }
        //Besucht der Benutzer zum ersten mal diese Seite kann er hier zwischen 
        //den Optionen "Einloggen", "Account erstellen" und "Als Gast fortfahren" wählen
        else
        {
           echo"<div class='flex-DirCol'>

                    <div class='middleMarginBottom'>
                        Sie sind derzeit nicht angemeldet! <br>
                        Bitte Wählen Sie eine der Folgenden Optionen:
                    </div>

                    <div class='middleMarginBottom'>
                        <a href='user-login.php' class='button buttonNormal'>Einloggen</a>
                    </div>

                    <div class='middleMarginBottom'>
                        <a href='user-create_account.php' class='button buttonNormal'>Account erstellen</a>
                    </div>

                    <div class='middleMarginBottom'>
                        <a href='bestellung_anschrift.php?checkoutAsGuest' class='button buttonNormal'>Als Gast fortfahren</a>
                    </div>

                </div>";
        }

    echo"</div>";

    pageFooter();
?>