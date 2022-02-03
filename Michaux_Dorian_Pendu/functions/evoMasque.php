<?php 

function evoMasque(string $lettre, string $motATrouver, string &$motMasque):bool{
    $lettreBonne = false;
    $newMasque = "";
    strtoupper($lettre);
    for($n = 0; $n < strlen($motATrouver); $n++){
        if($lettre == $motATrouver[$n]){
            $newMasque = $newMasque . $lettre;
            $lettreBonne = true;
        }else{
            $newMasque = $newMasque . $motMasque[$n];
        } 
    }

    $motMasque = $newMasque;

    return $lettreBonne;
}