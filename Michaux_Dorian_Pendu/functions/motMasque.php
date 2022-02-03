<?php 

function motMasque(string $mot):string{
    $motMasque = "";
    for($n = 0; $n < strlen($mot); $n++){
        if($mot[$n] === "-"){
            $motMasque = $motMasque . "-";
        }else{
            $motMasque = $motMasque . "*";
        }
    }

    return $motMasque;
}