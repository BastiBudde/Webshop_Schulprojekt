<?php
    session_start();

    //Sollte der Benutzer nicht eingeloggt sein so wird er zur Login-Seite weitergeleitet 
    if(!(isset($_SESSION['user_login_korrekt'])))
    {
        header("Location: user-login.php");
    }
    
    include "../includes/siteHeader.php";
    include "../includes/siteFooter.php";
    include "../includes/connectToDB.php";

    //SQL-Abfrage um aktuelle Benutzerinformationen zu besorgen
    $sql = "SELECT Vorname, Name, Strasse_Hausnr, PLZ, Ort, Telefon, E_Mail, Passwort
            FROM kunde
            WHERE ID_Kunde = ".$_SESSION['user_ID_kunde'].";";
    
    $result = mysqli_query($dbh, $sql)
        or die("Fehler bei der Query: " . mysqli_error($dbh));

    $user_information = mysqli_fetch_row($result);

    mysqli_close($dbh);

    //Auswertung der Nutzereingabe
    if(isset($_POST['submitted']))
    {
        $_SESSION['user_information_Vorname'] = $_POST['Vorname'];
        $_SESSION['user_information_Nachname'] = $_POST['Nachname'];
        $_SESSION['user_information_Strasse_hausnr'] = $_POST['Strasse_Hausnr'];
        $_SESSION['user_information_PLZ'] = $_POST['PLZ'];
        $_SESSION['user_information_Ort'] = $_POST['Ort'];
        $_SESSION['user_information_Telefon'] = $_POST['Telefon'];
        $_SESSION['user_information_E_Mail'] = $_POST['E_Mail'];
        
        // Sollten kein aktuelles Passwort und kein neues Passwort eingetragen sein
        // wird auf user-sendNewUserInfoToDB.php weitergeleitet
        if($_POST['aktuellesPasswort'] == "" && $_POST['neuesPasswort'] == "")
        {
            header("Location: user-sendNewUserInfoToDB.php");
        }

        // Sollte ein aktuelles Passwort eingetragen sein
        if($_POST['aktuellesPasswort'] != "")
        {
            // Sollte kein neues Passwort eingetragen sein wird die Nachricht
            // "Bitte geben Sie ein neues Passwort ein" angezeigt
            if($_POST['neuesPasswort'] == "")
            {
                header("Location: user-modifyUserInformation.php?notice=Bitte geben Sie ein neues Passwort ein");
            }
            // Sollte ein aktuelles Passwort und ein neues Passwort eingetragen sein
            // wird das neue Passwort wie die anderen Informationen in einer Session-Variable gespeichert 
            // und es wird auf user-sendNewUserInfoToDB.php weitergeleitet
            else
            {
                header("Location: user-sendNewUserInfoToDB.php");
                $_SESSION['user_information_NeuesPasswort'] = $_POST['neuesPasswort'];
            }
        }

        // Sollte ein neues Passwort eingetragen sein so wird die Nachricht
        // "Bitte geben Sie ihr aktuelles Passwort ein" ausgegeben
        if($_POST['neuesPasswort'] != "" && $_POST['aktuellesPasswort'] == "")
        {
            header("Location: user-modifyUserInformation.php?notice=Bitte geben Sie ihr aktuelles Passwort ein");
        }
    }

    pageHead("Meine Informationen");

    //Hier werden die aktuellen Benutzerinformationen angezeigt
    //Hier kann der Benutzer seine Informationen bearbeiten
    echo"<table class='costomerInformationTable'>
    
            <form action='user-modifyUserInformation.php' method='post'>
                <tr>
                    <td>
                        <label for='Vorname'>Vorname*</label>
                        <input type='text' name='Vorname' value='".$user_information[0]."' class='inputForm shortInput' id='Vorname' required='true' placeholder='Max'></input>
                    </td>
                    <td>
                        <label for='Nachname'>Nachname*</label>
                        <input type='text' name='Nachname' value='".$user_information[1]."' class='inputForm shortInput' id='Nachname' required='true' placeholder='Mustermann'></input>
                    </td>
                </tr>

                <tr>
                    <td colspan='2'>
                        <label for='Str_HausNr'>Straße und Hausnr.*</label>
                        <input type='text' name='Strasse_Hausnr' value='".$user_information[2]."' class='inputForm longInput' id='Str_HausNr' required='true' placeholder='Musterstraße 4'></input>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for='PLZ'>PLZ*</label>
                        <input type='number' name='PLZ' value='".$user_information[3]."' class='numInptWithoutArrows inputForm shortInput' id='PLZ' required='true' placeholder='11011'></input>
                    </td>
                    <td>
                        <label for='Ort'>Ort*</label>
                        <input type='text' name='Ort' value='".$user_information[4]."' class='inputForm shortInput' id='Ort' required='true' placeholder='Musterstedt'></input>
                    </td>
                </tr>

                <tr>
                    <td colspan='2'>
                        <label for='Telefon'>Telefon</label>
                        <input type='text' name='Telefon' value='".$user_information[5]."' class='inputForm longInput' id='Telefon' placeholder='123 456 7890'></input>
                    </td>
                </tr>

                <tr>
                    <td colspan='2'>
                        <label for='E_Mail'>E-Mail*</label>
                        <input type='email' name='E_Mail' value='".$user_information[6]."' class='inputForm longInput' id='E_Mail' required='true' placeholder='example@example.com'></input>
                    </td>
                </tr>

                <tr>
                    <td colspan='2'>
                        <label for='aktuellesPasswort'>Aktuelles Passwort</label>
                        <input type='text' name='aktuellesPasswort' class='inputForm longInput' id='aktuellesPasswort' placeholder='Z*ifb2PH$@oH-#>'></input>
                    </td>
                </tr>

                <tr>
                    <td colspan='2'>
                        <label for='neuesPasswort'>Neues Passwort</label>
                        <input type='text' name='neuesPasswort' class='inputForm longInput' id='neuesPasswort' placeholder='lsJMpw1JQXRCdAr'></input>
                    </td>
                </tr>
                
                <tr>
                    <td colspan='2'>
                        <label>Mit * markierte Felder sind Pflichtfelder</label>
                    </td>
                </tr>
                <tr>
                    <td id='submitButton'>
                        <input type='hidden' name='submitted'></input> 
                        <input type='submit' class='button buttonNormal' value='Speichern' onclick='return confirm(\"Wollen Sie die neuen wirklich Informationen Speichern?\");'></input>
                    </td>
                </tr>

            </form>
            
        </table>";

    pageFooter();
?>