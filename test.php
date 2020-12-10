<?php
class Diagramm {
    var $name; // String or numeric
    var $height; // Int
    var $width; // Int
    var $maxvalue_height; // Int
    var $x = array(); // Elements can be numeric or a string
    var $y = array(); // Elements are numeric

    // Diagrammname setzen
    function setName($name){
        if(!is_string($name) AND !is_numeric($name)){
            throw new Exception("Falscher Dateityp (".gettype($name).") number or string expected!");
            return false;
        }
        $this->name = $name;
    }

    // Diagrammname auslesen
    function getName(){
        return $this->name;
    }

    // Höhe des Diagramms setzen
    function setHeight($height){
        if(!is_int($height)){
            throw new Exception("Falscher Dateityp (".gettype($height).") integer expected!");
            return false;
        }
        $this->height = $height;
        return true;
    }

    // Höhe des Diagramms auslesen
    function getHeight(){
        return $this->height;
    }

    // Breite des Diagramms setzen
    function setWidth($width){
        if(!is_int($width)){
            throw new Exception("Falscher Dateityp (".gettype($width).") integer expected!");
            return false;
        }
        $this->width = $width;
        return true;
    }

    // Breite des Diagramms auslesen
    function getWidth(){
        return $this->width;
    }

    // Balkenhöhe des Maximalwertes setzen
    function setMaxvalueHeight($maxvalue_height){
        if(!is_int($maxvalue_height)){
            throw new Exception("Falscher Dateityp (".gettype($maxvalue_height).") integer expected!");
            return false;
        }
        $this->maxvalue_height = $maxvalue_height;
        return true;
    }

    // Balkenhöhe des Maximalwertes auslesen
    function getMaxvalueHeight(){
        return $this->maxvalue_height;
    }

    // Fügt einen X-Wert hinzu
    function addX($x){
        if(!is_numeric($x) AND !is_string($x)){
            throw new Exception("Falscher Dateityp (".gettype($x).") number or string expected!");
            return false;
        }
        $this->x[] = $x;
        return true;
    }

    // Fügt einen Y-Wert hinzu
    function addY($y){
        if(!is_numeric($y)){
            throw new Exception("Falscher Dateityp (".gettype($y).") number expected!");
            return false;
        }
        $this->y[] = $y;
        return true;
    }

    function _checkValues(){
        if(!isset($this->name)){
            throw new Exception("Kein Diagrammname vorhanden!");
            return false;
        }
        if(!isset($this->height)){
            throw new Exception("Keine Höhe für das Diagramm vorhanden!");
            return false;
        }
        if(!isset($this->width)){
            throw new Exception("Keine Breite für das Diagramm vorhanden!");
            return false;
        }
        if(!isset($this->maxvalue_height)){
            throw new Exception("Keine Höhe für den Maximalwert vorhanden!");
            return false;
        }
        if(!isset($this->x)){
            throw new Exception("Keine X-Werte vorhanden!");
            return false;
        }
        if(!isset($this->y)){
            throw new Exception("Keine Y-Werte vorhanden!");
            return false;
        }
        if(count($this->x)!=count($this->y)){
            throw new Exception("Anzahl der X- und Y-Werte stimmt nicht überein!");
            return false;
        }
        return true;
    }

    function _getRelation(){
        $relation = array();
        foreach($this->y as $key => $wert)
            $relation[$key] = $wert/$this->_getMaxValue();
        return $relation;
    }

    function _getMaxValue(){
        return max($this->y);
    }

    function _getDataNumber(){
        return count($this->y);
    }

    function display($echo = false){
        if(!$this->_checkValues())
            return '';
        $output = '';

        // Verhältnis aller Daten zum Maximalwert berechnen
        // Jeder Wert erhält dann als Höhe einen Bruchteil der
        // maximalen Balkenhöhe
        $relation = $this->_getRelation();

        // Tabelle erzeugen
        $output .= "<table cellpadding=\"1\" style=\"width:".$this->getWidth()."px; height:".$this->getHeight()."px; text-align:center; background-color:#aaa; border:solid 1px black; font-size:10px; margin:10px auto\">\n";
        // Diagrammname ausgeben
        $output .= " <tr>\n".
                   "  <td colspan=\"".$this->_getDataNumber()."\" style=\"height:20px;\">\n".
                   $this->getName()."\n".
                   "  </td>\n".
                   " </tr>\n";

        $output .= " <tr>\n";
        // Werte - also Balken - ausgeben
        foreach($relation as $key => $wert){
             // Breite einer Zelle und Höhe eines Balkens berechnen
             $output .= "  <td style=\"vertical-align:bottom; height:200px; width:".floor($this->getWidth()/$this->_getDataNumber())."px;\">".
                        "   <div style=\"margin:auto; background-color:red; height:".floor($this->getMaxvalueHeight()*$wert)."px; width:".floor(($this->getWidth()/2)/$this->_getDataNumber())."px\" title=\"".$this->y[$key]."\">".
                        "&nbsp;".
                        "   </div>".
                        "  </td>\n";
        }
        $output .= " </tr>\n";

        $output .= " <tr>\n";
        // Stellen - also Balkenzuordnung - ausgeben
        foreach($this->x as $stelle){
             $output .= "  <td style=\"vertical-align:middle; border:solid 1px black; border-width:1px 1px 0px 1px; height:80px;\">";
             $output .= $stelle;
             $output .= "  </td>\n";
        }

        $output .= " </tr>\n";
        $output .= "</table>\n";
        if($echo)
            echo $output;
        else
            return $output;
    }
}

  // Neues Objekt erzeugen
  $a = new Diagramm();
  // 'Versuche', die Konfiguration zu durchzuführen
  try{
      // Name setzen
      $a->setName("Besucherzahlen");
      // Höhe setzen
      $a->setHeight(300);
      // Breite setzen
      $a->setWidth(580);
      // Balkenhöhe setzen
      $a->setMaxvalueHeight(190);
      // X- und Y-Werte definieren
      $x = array('Januar', 'Februar', 'März', 'April', 'Mai', 'Juni');
      $y = array(    5500,     6800,    5200,    4800,  7000,   5900);
      // Werte im Diagrammobjekt speichern
      foreach($x as $key => $value){
          $a->addX($value);
          $a->addY($y[$key]);
      }
      // Diagramm ausgeben
      $a->display(true);
  }
  // Geworfene Exceptions auswerten
  catch(Exception $e){ 
      echo '<strong>Fehler: </strong>'.$e->getMessage();
  }
?>