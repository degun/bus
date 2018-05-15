<?php

    function validateShkronja($str, $what){
        if(empty($str)){
            return "Mungon ".$what;
        }elseif(!preg_match("/^[a-zA-ZëçËÇ ]*$/",$str)){
            return "Lejohen vetëm shkronja dhe hapësirë boshe tek ".$what;
        }else{
            return "";
        }
    }

    function validateNumra($str, $what){
        if(empty($str)){
            return "Mungon ".$what;
        }elseif(!preg_match("/^[0-9]*$/",$str)){
            return "Lejohen vetëm numra tek ".$what;
        }else{
            return "";
        }
    }

    function validateEmail($str, $what){
        if(empty($str)){
            return "Mungon ".$what;
        }elseif(!preg_match("/.+\@.+\..+/",$str)){
            return $what." jo e saktë."; // regex i marrë nga W3C
        }else{
            return "";
        }
    } 

    function validateNotEmpty($str, $what){
        if(empty($str)){
            return "Mungon ".$what;
        }else{
            return "";
        }
    } 

    function validateConfirmPass($pass1, $pass2){
        if(!($pass1 == $pass2)){
            return "Fjalëkalimet nuk janë njësoj";
        }else{
            return "";
        }
    } 
    
?>

