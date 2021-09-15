<?php

function checkNom($nom){
    if(preg_match("#^.*[/\\\,;:!?\*].*$#",$nom)){
        echo "Erreur dans le nommage d'un paramètre !";
        die();
    }
}


