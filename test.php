<?php
// Folgender Code stammt von der Webseite: https://www.php-einfach.de/experte/php-codebeispiele/pdf-per-php-erstellen-pdf-rechnung/
// Autor: Nils Reimers

$rechnungs_nummer = "743";
$rechnungs_datum = date("d.m.Y");
$lieferdatum = date("d.m.Y");
$pdfAuthor = "PHP-Einfach.de";
 
$rechnungs_header = '
<img src="Bilder/GamingHeavenLogo.svg">
PHP-Einfach.de
Nils Reimers
www.php-einfach.de';
 
$rechnungs_empfaenger = 'Max Musterman
Musterstraße 17
12345 Musterstadt';
 
$rechnungs_footer = "Wir bitten um eine Begleichung der Rechnung innerhalb von 14 Tagen nach Erhalt. Bitte Überweisen Sie den vollständigen Betrag an:
 
<b>Empfänger:</b> Meine Firma
<b>IBAN</b>: DE85 745165 45214 12364
<b>BIC</b>: C46X453AD";
 
//Auflistung eurer verschiedenen Posten im Format [Produktbezeichnung, Menge, Einzelpreis]
$rechnungs_posten = array(
 array("Produkt 1", 1, 42.50),
 array("Produkt 2", 5, 5.20),
 array("Produkt 3", 3, 10.00));
 
//Höhe eurer Umsatzsteuer. 0.19 für 19% Umsatzsteuer
$umsatzsteuer = 0.0; 
 
$pdfName = "Rechnung_".$rechnungs_nummer.".pdf";
 
 
//////////////////////////// Inhalt des PDFs als HTML-Code \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
 
 
// Erstellung des HTML-Codes. Dieser HTML-Code definiert das Aussehen eures PDFs.
// tcpdf unterstützt recht viele HTML-Befehle. Die Nutzung von CSS ist allerdings
// stark eingeschränkt.
 
$html = '
<table cellpadding="5" cellspacing="0" style="width: 100%; ">
 <tr>
 <td>'.nl2br(trim($rechnungs_header)).'</td>
    <td style="text-align: right">
Rechnungsnummer '.$rechnungs_nummer.'<br>
Rechnungsdatum: '.$rechnungs_datum.'<br>
Lieferdatum: '.$lieferdatum.'<br>
 </td>
 </tr>
 
 <tr>
 <td style="font-size:1.3em; font-weight: bold;">
<br><br>
Rechnung
<br>
 </td>
 </tr>
 
 
 <tr>
 <td colspan="2">'.nl2br(trim($rechnungs_empfaenger)).'</td>
 </tr>
</table>
<br><br><br>
 
<table cellpadding="5" cellspacing="0" style="width: 100%;" border="0">
 <tr style="background-color: #cccccc; padding:5px;">
 <td style="padding:5px;"><b>Bezeichnung</b></td>
 <td style="text-align: center;"><b>Menge</b></td>
 <td style="text-align: center;"><b>Einzelpreis</b></td>
 <td style="text-align: center;"><b>Preis</b></td>
 </tr>';
 
 
$gesamtpreis = 0;
 
foreach($rechnungs_posten as $posten) {
 $menge = $posten[1];
 $einzelpreis = $posten[2];
 $preis = $menge*$einzelpreis;
 $gesamtpreis += $preis;
 $html .= '<tr>
                <td>'.$posten[0].'</td>
 <td style="text-align: center;">'.$posten[1].'</td> 
 <td style="text-align: center;">'.number_format($posten[2], 2, ',', '').' Euro</td>	
                <td style="text-align: center;">'.number_format($preis, 2, ',', '').' Euro</td>
              </tr>';
}
$html .="</table>";
 
 
 
$html .= '
<hr>
<table cellpadding="5" cellspacing="0" style="width: 100%;" border="0">';
if($umsatzsteuer > 0) {
 $netto = $gesamtpreis / (1+$umsatzsteuer);
 $umsatzsteuer_betrag = $gesamtpreis - $netto;
 
 $html .= '
 <tr>
 <td colspan="3">Zwischensumme (Netto)</td>
 <td style="text-align: center;">'.number_format($netto , 2, ',', '').' Euro</td>
 </tr>
 <tr>
 <td colspan="3">Umsatzsteuer ('.intval($umsatzsteuer*100).'%)</td>
 <td style="text-align: center;">'.number_format($umsatzsteuer_betrag, 2, ',', '').' Euro</td>
 </tr>';
}
 
$html .='
            <tr>
                <td colspan="3"><b>Gesamtsumme: </b></td>
                <td style="text-align: center;"><b>'.number_format($gesamtpreis, 2, ',', '').' Euro</b></td>
            </tr> 
        </table>
<br><br><br>';
 
if($umsatzsteuer == 0) {
 $html .= 'Nach § 19 Abs. 1 UStG wird keine Umsatzsteuer berechnet.<br><br>';
}
 
$html .= nl2br($rechnungs_footer);

echo $html;