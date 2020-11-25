<?php

/*  Durchsucht jedes Element des shoppingCart-Arrays nach einer eingegebenen ID und gibt ggf. den Index des Elementes Zurück.
Wird kein Element gefunden welches die ID enthält wird False zurückgegeben */

    function searchForID_Product($ID_Produkt, $array)
    {
        $n = 0;
        foreach ($array as $item)
        {
            if($item['ID_Produkt'] === $ID_Produkt)
            {
                return $n;
            }
            else
            {
                $n++;
            }
        }
        return FALSE;
    }

?>