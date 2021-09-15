<?php

require_once('views/view.php');

function ctlHome(){
    $nb_fichier = 0;
    $tab_nom_manga = array();

    //On ouvre le dossier souhaité avec la fonction opendir(), et on stock le résultat dans la variable $dossier
    if($dossier = opendir('static/manga/')){ 

        //On une boucle avec While, et avec la fonction readdir on lis ce que contient la variable 'dossier' ( false !== vérifie que la lecture du dossier n'a pas retourné d'erreur.)
        while(false !== ($fichier = readdir($dossier))) {
            if($fichier != '.' && $fichier != '..'){
                $nb_fichier++; 
                $tab_nom_manga[]=$fichier;
            }
            
        }
    }

	displayHome($nb_fichier, $tab_nom_manga);
}