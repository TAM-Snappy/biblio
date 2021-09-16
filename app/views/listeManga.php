<?php

$contents='<strong>'. $data['nb_manga'] .'</strong> manga disponibles <br><ul>';

foreach($data['tab_nom_manga'] as $nom_manga){
    $contents.='<li><a href="/biblio_manga/biblio/public/manga/titre/'.$nom_manga.'" >'.$nom_manga.'</a></li>';
}

$contents.='</ul>';
require_once('gabarit.php');
