<?php
    function isValidDate($dateInput){
        if (strlen($dateInput) != 10){
            echo "Invalid date format";  
            echo "<br/>";
            return FALSE;
        }
        else {
            $mm = (int) substr($dateInput, 0, 2); 
            $dd = (int) substr($dateInput, 3, 5);
            $yyyy = (int) substr($dateInput, 6, 10);
            if (checkdate($mm, $dd, $yyyy))
                return TRUE;
            else{
                echo "Invalid date"; 
                echo "<br/>";
                return FALSE;
            }
        }    
    }

    function flsValidRange($value, $min, $max){
        if (is_numeric($value) && is_numeric($min) && is_numeric($max)){
            if ((int)$value > (int)$min && (int)$value < (int)$max)
                return TRUE;
            else{
                echo "Age out of range";
                echo "<br/>";
            }
        }
        else{
            echo "Invalid age";
            echo "<br/>";
            return FALSE;    
        }
    }

    function flsValidZipcode($zip){
        if (is_numeric($zip) &&  strlen($zip) == 5)
            return TRUE;
        else {
            echo "Invalid zip code";
            echo "<br/>";
            return FALSE;
        }
    }
?>