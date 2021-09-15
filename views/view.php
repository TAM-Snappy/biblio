<?php

function displayHome($nb_fichier, $tab_nom_manga){
    $contents='<strong>'. $nb_fichier .'</strong> manga disponibles <br><ul>';

    foreach($tab_nom_manga as $nom_manga){
        $contents.='<li><a href="index.php?manga='.$nom_manga.'" >'.$nom_manga.'</a></li>';
    }

    $contents.='</ul>';
    require_once('views/gabarit.php');
}

