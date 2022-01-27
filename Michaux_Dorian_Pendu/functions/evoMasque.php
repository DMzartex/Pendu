<?php 

function evoMasque(char $lettre, string $motATrouver, string $motMasque):bool{
    $lettreBonne = false;
    $newMasque = "";
    strtoupper($lettre);
    for($n = 0; $n < strlen($motATrouver) - 1; $n++){
        if($lettre === $motATrouver[$n]){
            $newMasque = $newMasque . $lettre;
            $lettreBonne = true;
        }else{
            $newMasque = $newMasque . $motMasque[$n];
        } 
    }

    return $lettreBonne;
}